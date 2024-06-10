<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function profile()
    {
        return view("pages.admin.profile.profile");
    }

    public function setting(Request $request)
    {
        $id = $request->id;
        $data = User::find($id);
        return view("pages.admin.profile.setting", ['data' => $data]);
    }
    /**
     * Update the user's profile information.
     */



    public function update(Request $request)
    {
        $id = $request->id;
        $nip = $request->nip;
        $name = $request->name;
        $jabatan = $request->jabatan;
        $email = $request->email;
        $password = $request->password;

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Simpan file ke dalam direktori 'public/img/'
            $foto = $request->file('foto')->move(public_path('img'), $request->file('foto')->getClientOriginalName());
            // Ambil path relatif dari file
            $fotoPath = 'img/' . $request->file('foto')->getClientOriginalName();
        } else {
            $fotoPath = null; // Atau atur foto menjadi null jika tidak ada file yang diunggah
        }

        // Hash password menggunakan bcrypt
        $hashedPassword = Hash::make($password);

        $data = [
            'nip' => $nip,
            'name' => $name,
            'jabatan' => $jabatan,
            'email' => $email,
            'password' => $hashedPassword, // Menggunakan password yang telah di-hash
            'foto' => $fotoPath
        ];

        User::where('id', $id)->update($data);

        return redirect('/profile/profile')->with(['success' => 'Data Berhasil Disimpan']);
    }
}
