<?php

namespace App\Http\Controllers;

use App\Models\Disposition;
use App\Models\transaksi_surat_masuk;
use Illuminate\Http\Request;


class DispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalds = Disposition::count();
        $disposition = Disposition::all();
        return view("pages.admin.surat.disposisi.index", ['totalds' => $totalds, 'datas' => $disposition]);
    }

    public function create(Request $request)
    {
        $id = $request->id;
        $data = transaksi_surat_masuk::find($id);
        // dd($data);
        return view("pages.admin.surat.disposisi.create", ['data' => $data]);
    }



    public function show(Request $request)
    {
        $id = $request->id;
        $data = Disposition::find($id);
        // dd($data);
        return view("pages.admin.surat.disposisi.show", ['data' => $data]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'asal_surat' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            // 'nomor_agenda' => 'required',
            'catatan' => 'required',
        ]);

        // Set default value for 'nomor_agenda' if it's empty
        $nomor_agenda = $request->nomor_agenda ?? '';
        // Set the values of sifat_surat, diteruskan, and hormat as strings
        $sifat_surat = $request->input('sifat_surat') ?? '';
        $diteruskan = $request->input('diteruskan') ?? '';
        $hormat = $request->input('hormat') ?? '';

        $data = [
            'asal_surat' => $request->asal_surat,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tanggal_diterima' => $request->tanggal_diterima,
            'nomor_agenda' => $nomor_agenda,
            'sifat_surat' => $sifat_surat,
            'perihal' => $request->perihal,
            'diteruskan' => $diteruskan,
            'hormat' => $hormat,
            'catatan' => $request->catatan,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Disposition::insert($data);
        $dataBerhasilDisimpan = true; // Ganti dengan logika penyimpanan yang sesuai

        if ($dataBerhasilDisimpan) {
            return redirect('/surat/disposisi/index')->with('status', 'Data Berhasil Disimpan');
        } else {
            return redirect('/surat/disposisi/index')->with('error', 'Data Gagal Disimpan');
        }
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Disposition::find($id);
        // dd($id);
        return view("pages.admin.surat.disposisi.edit", ['data' => $data]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $asal_surat = $request->asal_surat;
        $nomor_surat = $request->nomor_surat;
        $tanggal_surat = $request->tanggal_surat;
        $tanggal_diterima = $request->tanggal_diterima;
        $nomor_agenda = $request->nomor_agenda;
        $sifat_surat = $request->sifat_surat ? '1' : '0'; // Convert boolean to string
        $perihal = $request->perihal;
        $diteruskan = $request->diteruskan ? '1' : '0'; // Convert boolean to string
        $hormat = $request->hormat ? '1' : '0'; // Convert boolean to string
        $catatan = $request->catatan;

        $data = [
            'asal_surat' => $asal_surat,
            'nomor_surat' => $nomor_surat,
            'tanggal_surat' => $tanggal_surat,
            'tanggal_diterima' => $tanggal_diterima,
            'nomor_agenda' => $nomor_agenda,
            'sifat_surat' => $sifat_surat,
            'perihal' => $perihal,
            'diteruskan' => $diteruskan,
            'hormat' => $hormat,
            'catatan' => $catatan
        ];

        Disposition::where('id', $id)->update($data);

        $dataBerhasilDisimpan = true; // Ganti dengan logika penyimpanan yang sesuai

        if ($dataBerhasilDisimpan) {
            return redirect('/surat/disposisi/index')->with('status', 'Data Berhasil Di Perbarui');
        } else {
            return redirect('/surat/disposisi/index')->with('error', 'Data Gagal Di Perbarui');
        }
    }


    public function destroy(Request $request)
    {
        Disposition::where('id', $request->id)->delete();


        return redirect('/surat/disposisi/index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
