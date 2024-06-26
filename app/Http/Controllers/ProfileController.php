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

        // Ambil data user berdasarkan ID
        $user = User::find($id);

        // Ambil nilai yang diubah dari request
        $nip = $request->nip ?: $user->nip; // Jika tidak ada perubahan, gunakan nilai dari user sebelumnya
        $username = $request->username ?: $user->username;
        $jabatan = $request->jabatan ?: $user->jabatan;
        $email = $request->email ?: $user->email;
        $password = $request->password ?: $user->password; // Perhatikan, biasanya password tidak boleh disimpan dalam plaintext, jadi mungkin perlu logika tambahan

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto yang ada jika ingin diganti
            if ($user->foto) {
                Storage::delete($user->foto); // Hapus foto dari storage
            }

            // Simpan file ke dalam direktori 'public/img/'
            $foto = $request->file('foto')->move(public_path('img'), $request->file('foto')->getClientOriginalName());
            // Ambil path relatif dari file
            $fotoPath = 'img/' . $request->file('foto')->getClientOriginalName();
        } else {

            $fotoPath = $user->foto; // Gunakan foto yang sudah ada jika tidak ada perubahan
        }

        // Hash password menggunakan bcrypt
        $hashedPassword = Hash::make($password);

        $data = [
            'nip' => $nip,
            'username' => $username,
            'jabatan' => $jabatan,
            'email' => $email,
            // 'password' => $hashedPassword, // Menggunakan password yang telah di-hash
            'foto' => $fotoPath
        ];

        User::where('id', $id)->update($data);

        return redirect('/profile/profile')->with(['success' => 'Data Berhasil Disimpan']);
    }
}
