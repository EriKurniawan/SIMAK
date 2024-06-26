<?php

namespace App\Http\Controllers;

use App\Models\disposition;
use Carbon\Carbon;
use App\Models\transaksi_surat_masuk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class TransaksiSuratMasukController extends Controller
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
        $cekData = transaksi_surat_masuk::whereBetween('created_at', [$dariTanggal, $sampaiTanggal])
            ->orderBy('created_at')
            ->get();

        // Hitung jumlah surat yang telah terdisposisi
        $jumlahTerdisposisi = disposition::count();

        // Hitung total surat masuk
        $totalsm = transaksi_surat_masuk::count();

        // Hitung jumlah surat yang belum terdisposisi
        $jumlahBelumTerdisposisi = $totalsm - $jumlahTerdisposisi;

        // Pass the results to the view
        return view('pages.admin.surat.sm.index', ['totalsm' => $totalsm, 'jumlahTerdisposisi' => $jumlahTerdisposisi, 'jumlahBelumTerdisposisi' => $jumlahBelumTerdisposisi, 'datas' => $cekData]);
    }









    public function index()
    {
        // Hitung jumlah surat yang telah terdisposisi
        $jumlahTerdisposisi = disposition::count();

        // Hitung total surat masuk
        $totalsm = transaksi_surat_masuk::count();

        // Hitung jumlah surat yang belum terdisposisi
        $jumlahBelumTerdisposisi = $totalsm - $jumlahTerdisposisi;

        $transaksi_surat_masuk = transaksi_surat_masuk::all();

        return view("pages.admin.surat.sm.index", ['totalsm' => $totalsm, 'jumlahTerdisposisi' => $jumlahTerdisposisi, 'jumlahBelumTerdisposisi' => $jumlahBelumTerdisposisi, 'datas' => $transaksi_surat_masuk]);
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
        return redirect('/surat/sm/index');
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $data = transaksi_surat_masuk::find($id);
        // dd($data);
        return view("pages.admin.surat.sm.show", ['data' => $data]);
    }

    public function create()
    {
        return view("pages.admin.surat.sm.create");
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validasi = $request->validate([
            'nomor_surat' => 'required',
            'asal_surat' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'perihal' => 'required',
            'lampiran' => 'required|file|mimes:pdf|max:2048',
        ]);


        // Simpan file PDF ke dalam direktori 'public/dokumen/' dengan nama yang unik
        $file_lampiran = $request->file('lampiran');
        $rename_file = Str::random(40) . '.' .  $file_lampiran->getClientOriginalExtension();
        $file_lampiran->move(public_path('dokumen'), $rename_file);

        // Data surat
        $data = [
            'asal_surat' => $request->asal_surat,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_diterima' => $request->tanggal_diterima,
            'perihal' => $request->perihal,
            'lampiran' => $rename_file, // Simpan nama file di database
            'created_at' => now(),
            'updated_at' => now(),
        ];


        // Simpan data surat masuk

        $dataBerhasilDisimpan = transaksi_surat_masuk::insert($data);
        // Redirect dengan pesan sukses



        if ($dataBerhasilDisimpan) {
            return redirect('/surat/sm/index')->with('status', 'Data Berhasil Disimpan');
        } else {
            return redirect('/surat/sm/index')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = transaksi_surat_masuk::find($id);
        // dd($id);
        return view("pages.admin.surat.sm.edit", ['data' => $data]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $nomor_surat = $request->nomor_surat;
        $asal_surat = $request->asal_surat;
        $tanggal_surat = $request->tanggal_surat;
        $tanggal_diterima = $request->tanggal_diterima;
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
            $old_file_path = public_path('dokumen') . '/' . $request->lampiran;
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        } elseif ($request->has('lampiran')) {
            // Jika tidak ada file yang diunggah, tetap gunakan nama file yang lama
            $lampiran = $request->lampiran;
        }

        $data = [
            'nomor_surat' => $nomor_surat,
            'asal_surat' => $asal_surat,
            'tanggal_surat' => $tanggal_surat,
            'tanggal_diterima' => $tanggal_diterima,
            'perihal' => $perihal,
        ];

        // Hanya menambahkan kolom lampiran jika ada file yang diunggah atau ada lampiran yang tersedia
        if (!is_null($lampiran)) {
            $data['lampiran'] = $lampiran;
        }

        $updateSuccess = transaksi_surat_masuk::where('id', $id)->update($data);

        // Redirect dengan pesan sukses



        if ($updateSuccess) {
            return redirect('/surat/sm/index')->with('status', 'Data Berhasil Di Perbarui');
        } else {
            return redirect('/surat/sm/index')->with('error', 'Data Gagal Di Perbarui');
        }
    }

    public function destroy(Request $request)
    {
        // Temukan data berdasarkan ID yang diberikan
        $transaksi_surat_keluar = transaksi_surat_masuk::findOrFail($request->id);

        // Hapus data yang ditemukan
        $deleted = $transaksi_surat_keluar->delete();

        // Cek apakah data berhasil dihapus
        if ($deleted) {
            return redirect('/surat/sm/index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/surat/sm/index')->with('error', 'Data gagal dihapus');
        }
    }
}
