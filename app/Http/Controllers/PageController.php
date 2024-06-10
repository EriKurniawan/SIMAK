<?php

namespace App\Http\Controllers;


use App\Models\disposition;
use App\Models\page;
use App\Models\pengguna;
use App\Models\transaksi_surat_keluar;
use App\Models\transaksi_surat_masuk;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $totalsm = transaksi_surat_masuk::count();
        $totalsk = transaksi_surat_keluar::count();
        $totalds = disposition::count();
        $totalpg = pengguna::count();
        return view("pages.admin.dashboard", ['totalsm' => $totalsm, 'totalsk' => $totalsk, 'totalds' => $totalds, 'totalpg' => $totalpg]);
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $nip = $request->nip;
        $nama = $request->nama;
        $email = $request->email;
        $jabatan = $request->jabatan;
        $password = $request->password;
        $foto = $request->foto;

        $foto = $request->file('foto');
        $filename = date('Y-m-d') . $foto->getClientOriginalName();
        $path = 'file-surat/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($foto));

        $data = [

            'nip' => $nip,
            'nama' => $nama,
            'email' => $email,
            'jabatan' => $jabatan,
            'password' => $password,
            'foto' => $foto,

        ];

        page::where('id', $id)->update($data);

        // dd($data);
        return redirect('/profile')->with(['success' => 'Data Berhasil Disimpan']);
    }
}
