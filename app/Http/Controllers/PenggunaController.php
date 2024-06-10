<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view("pages.admin.user.index", ['datas' => $pengguna]);
    }



    public function create()
    {
        return view("pages.admin.user.create");
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nip' => 'required',
            'username' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'required',

        ]);

        // Simpan file foto ke dalam direktori 'public/img/' dengan nama yang unik
        $file_lampiran = $request->file('foto');
        $rename_file = Str::random(40) . '.' .  $file_lampiran->getClientOriginalExtension();
        $file_lampiran->move(public_path('img'), $rename_file);

        $data = [
            'nip' => $request->nip,
            'username' => $request->username,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'password' => bcrypt($request->password), // Menggunakan bcrypt untuk menyimpan password dalam bentuk hash
            'level' => $request->level,
            'foto' => $rename_file,
            'created_at' => now(),
            'updated_at' => now(),

        ];
        // dd($data);
        User::insert($data);

        $dataBerhasilDisimpan = true; // Ganti dengan logika penyimpanan yang sesuai

        if ($dataBerhasilDisimpan) {
            return redirect('/user/index')->with('status', 'Data Berhasil Disimpan');
        } else {
            return redirect('/user/index')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        // dd($id);
        return view("pages.admin.user.edit", ['data' => $data]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $nip = $request->nip;
        $username = $request->username;
        $email = $request->email;
        $jabatan = $request->jabatan;
        $password = $request->password;
        $level = $request->level;
        $foto = $request->foto;

        // Simpan file foto ke dalam direktori 'public/img/' dengan nama yang unik
        $foto = $request->file('foto');
        $nama_file_unik = Str::random(40) . '.' .  $foto->getClientOriginalExtension();
        $foto->move(public_path('img'), $nama_file_unik);

        $data = [

            'nip' => $nip,
            'username' => $username,
            'email' => $email,
            'jabatan' => $jabatan,
            'password' => $password,
            'level' => $level,
            'foto' => $nama_file_unik,
            'created_at' => now(),
            'updated_at' => now(),

        ];

        User::where('id', $id)->update($data);

        // dd($data);
        $dataBerhasilDisimpan = true; // Ganti dengan logika penyimpanan yang sesuai

        if ($dataBerhasilDisimpan) {
            return redirect('/user/index')->with('status', 'Data Berhasil Di Perbarui');
        } else {
            return redirect('/user/index')->with('error', 'Data Gagal Di Perbarui');
        }
    }

    public function destroy(Request $request)
    {
        User::where('id', $request->id)->delete();


        return redirect('/user/index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
