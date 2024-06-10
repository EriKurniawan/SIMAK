<?php

namespace App\Http\Controllers;

use App\Models\keterangan;
use App\Models\transaksi_index;
use App\Models\transaksi_surat_keluar;
use App\Models\transaksi_surat_masuk;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TransaksiSuratKeluarController extends Controller
{
    public function search(Request $request)
    {
        // Validate the request
        $request->validate([
            'dari_tanggal' => 'required|date',
            'sampai_tanggal' => 'required|date',
        ]);

        // Retrieve input values
        $dariTanggal = $request->input('dari_tanggal');
        $sampaiTanggal = $request->input('sampai_tanggal');

        // Perform the query
        $cekData = transaksi_surat_keluar::whereBetween('created_at', [$dariTanggal, $sampaiTanggal])
            ->orderBy('created_at')
            ->get();

        // Hitung total surat masuk
        $totalsk = transaksi_surat_keluar::count();

        // Pass the results to the view
        return view('pages.admin.surat.sk.index', ['totalsk' => $totalsk,  'datas' => $cekData]);
    }

    public function index()
    {
        $totalsk = transaksi_surat_keluar::count();
        $transaksi_surat_keluar = transaksi_surat_keluar::all();
        return view("pages.admin.surat.sk.index", ['totalsk' => $totalsk, 'datas' => $transaksi_surat_keluar]);;
    }
    public function create()
    {
        $data_keterangan = keterangan::all();
        return view("pages.admin.surat.sk.create", ['data_keterangan' => $data_keterangan]);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $data = transaksi_surat_keluar::find($id);
        // dd($data);
        return view("pages.admin.surat.sk.show", ['data' => $data]);
    }

    public function store(Request $request)
    {
        // Mendapatkan nomor surat terakhir
        $dates = date_create($request->tanggal_surat);
        $new_dates = date_format($dates, 'm-Y');
        $new_date = null; // Deklarasi variabel $new_date di sini

        $last_surat = transaksi_surat_keluar::where('tanggal_surat', 'like', '%' . $new_dates . '%')
            ->orderByDesc('tanggal_surat')
            ->orderByDesc('id')
            ->first();

        // HItung jumlah surat database
        $hitung_surat = transaksi_surat_keluar::count();
        // Nilai default jika tidak ada nomor surat sebelumnya

        if ($hitung_surat == 0) {
            // Jika ada data, ambil nomor urut dari nomor surat terakhir
            $nomor_surat = 1;
        } else {
            if ($last_surat) {
                $tanggal_bulan_db = $last_surat->tanggal_surat;
                $new_date = date_create($tanggal_bulan_db); // Menginisialisasi $new_date di sini
                $fix_date_format = date_format($new_date, 'm-Y');

                $nomor_surat_db = $last_surat->nomor_surat;
                $explode_nomor_surat = explode("/", $nomor_surat_db);

                $nomor_surat = $explode_nomor_surat[1] + 1;
            } else {
                $ceking_db = transaksi_surat_keluar::orderByDesc('tanggal_surat')
                    ->orderByDesc('id')
                    ->first();
                if ($ceking_db) {
                    $new_date = date_create($ceking_db->tanggal_surat); // Menginisialisasi $new_date di sini
                    $fix_date_format = date_format($new_date, 'm-Y');
                }

                $nomor_surat_db = $ceking_db->nomor_surat;
                $explode_nomor_surat = explode("/", $nomor_surat_db);

                if ($fix_date_format == $new_dates) {
                    $nomor_surat = $explode_nomor_surat[1] + 1;
                } else {
                    $nomor_surat = $explode_nomor_surat[1] + 5;
                }
            }
        }

        if ($new_date) {
            $date_year = date_format($new_date, 'Y');
        } else {
            $date_year = date('Y');
        }

        $cek_data_seluruh = transaksi_surat_keluar::where('nomor_surat', 'like', '____' . $nomor_surat . '%')
            ->where('tanggal_surat', 'like', '%' . $date_year . '%')
            ->count();

        if ($cek_data_seluruh == 0) {
            // Mendapatkan tahun sekarang
            $tahun = date('Y');
            // Validasi data input
            $validasi = $request->validate([
                'tujuan' => 'required',
                'tanggal_surat' => 'required',
                'keterangan' => 'required',
                'perihal' => 'required',
                'lampiran' => 'required|file|mimes:doc,docx,pdf,xls,xlsx,ppt|max:2048',
            ]);

            // Simpan file PDF ke dalam direktori 'public/dokumen/' dengan nama yang unik
            $file_lampiran = $request->file('lampiran');
            $rename_file = Str::random(40) . '.' .  $file_lampiran->getClientOriginalExtension();
            $file_lampiran->move(public_path('dokumen'), $rename_file);

            // Mengambil nilai kode dari database berdasarkan keterangan yang dipilih
            $kode = keterangan::where('keterangan', $request->keterangan)->value('kode');

            // Memastikan jika tidak ada kode yang ditemukan, maka diatur sebagai string kosong
            $kode = $kode ?? '';

            $nomorSuratOtomatis = "{$kode}/{$nomor_surat}/II.15/TUBABA/{$tahun}";

            // dd($nomorSuratOtomatis);
            // Data surat
            $data = [
                'nomor_surat' => $nomorSuratOtomatis,
                'tujuan' => $request->tujuan,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
                'perihal' => $request->perihal,
                'lampiran' => $rename_file,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Simpan data surat keluar
            transaksi_surat_keluar::insert($data);
            // Redirect dengan pesan sukses

            $dataBerhasilDisimpan = true; // Ganti dengan logika penyimpanan yang sesuai

            if ($dataBerhasilDisimpan) {
                return redirect('/surat/sk/index')->with('status', 'Data Berhasil Disimpan');
            } else {
                return redirect('/surat/sk/index')->with('error', 'Data Gagal Disimpan');
            }
        }
    }

    public function download(Request $request)
    {

        $lampiran = $request->id;
        $filePath = public_path('/dokumen' . '/' . $lampiran);

        if (file_exists($filePath)) {
            return response()->download($filePath, $lampiran);
        } else {
            abort(404, 'File not found');
        }
        // dd($lampiran);
        return redirect('/surat/sk/index');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data_keterangan = keterangan::all();
        $data = transaksi_surat_keluar::find($id);
        // dd($id);
        return view("pages.admin.surat.sk.edit", ['data' => $data], ['data_keterangan' => $data_keterangan]);
    }

    public function update(Request $request)
    {
        // Cari data dengan ID yang diberikan yang sudah di tangkap
        $id = $request->id;

        // Cari data berdasarkan ID
        $data = transaksi_surat_keluar::findOrFail($id);

        // Pastikan keterangan tidak berubah
        $keterangan = $data->keterangan;

        // Ambil data dari request
        $tujuan = $request->tujuan;
        $tanggal_surat = $request->tanggal_surat;
        $perihal = $request->perihal;

        // Inisialisasi variabel $lampiran
        $lampiran = null;

        // Cek apakah ada file lampiran PDF yang diunggah
        if ($request->hasFile('lampiran')) {
            // Simpan file PDF ke dalam direktori 'public/dokumen/' dengan nama yang unik
            $file_lampiran = $request->file('lampiran');
            $rename_file = Str::random(40) . '.' .  $file_lampiran->getClientOriginalExtension();
            $file_lampiran->move(public_path('dokumen'), $rename_file);

            // Perbarui nilai $lampiran dengan nama file yang baru
            $lampiran = $rename_file;

            // Hapus file lampiran lama jika ada
            $old_file_path = public_path('dokumen') . '/' . $data->lampiran;
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        } else {
            // Jika tidak ada file yang diunggah, tetap gunakan nama file yang lama
            $lampiran = $data->lampiran;
        }

        // Perbarui data kecuali keterangan
        $data->update([
            'tujuan' => $tujuan,
            'tanggal_surat' => $tanggal_surat,
            'keterangan' => $keterangan,
            'perihal' => $perihal,
            'lampiran' => $lampiran, // Perbarui nilai lampiran dengan nilai baru jika ada
        ]);

        // Redirect ke halaman index dengan pesan sukses
        $dataBerhasilDisimpan = true; // Ganti dengan logika penyimpanan yang sesuai

        if ($dataBerhasilDisimpan) {
            return redirect('/surat/sk/index')->with('status', 'Data Berhasil Di Perbarui');
        } else {
            return redirect('/surat/sk/index')->with('error', 'Data Gagal Di Perbarui');
        }
    }


    public function destroy(Request $request)
    {
        // Temukan data berdasarkan ID yang diberikan
        $transaksi_surat_keluar = transaksi_surat_keluar::findOrFail($request->id);

        // Hapus data yang ditemukan
        $deleted = $transaksi_surat_keluar->delete();

        // Cek apakah data berhasil dihapus
        if ($deleted) {
            return redirect('/surat/sk/index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/surat/sk/index')->with('error', 'Data gagal dihapus');
        }
    }
}
