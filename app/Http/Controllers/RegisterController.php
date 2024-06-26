<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.admin.login.register');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;


        // Hash password menggunakan bcrypt
        $hashedPassword = Hash::make($password);

        $data = [

            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword, // Menggunakan password yang telah di-hash

        ];

        User::where('id', $id)->update($data);

        return redirect('/login')->with(['success' => 'Data Berhasil Disimpan']);
    }
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users',
    //         'password' => 'required',
    //     ]);

    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     User::create($validatedData);

    //     return redirect('/login')->with('success', 'User created successfully!');
    // }
}
