<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('Login/login');
    }
    public function register(){
        return view('Login/register');
    }
    public function authenticating(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)){
            if(Auth::user()->status == 'Active'){
                if(Auth::user()->id_role == 1){
                    return redirect('dashboard');
                } elseif(Auth::user()->id_role == 2 || Auth::user()->id_role == 3) {
                    return redirect('/home');
                } else {
                    return redirect('/logout')->with('status', 'Login Invalid!');
                }
            } else {
                return redirect('/logout')->with('status', 'Login Invalid!');
            }
        } else {
            return redirect('/logout')->with('status', 'Login Invalid!');
        }        
            // return view('Login/login');
        }
        // cek apakah login valid  
    //         if (Auth::attempt($credentials)){
    //             if(Auth::user()->id_role == 1){
    //                 return redirect('dashboard');
    // }
    //         // $request->session()->regenerate();
    //         if(Auth::user()->id_role == 2 && Auth::user()->id_role ==3){
    //             return redirect('profile');
    //         }
    //         }
        
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
        
        public function registerprocess(Request $request)
        {
            $validated = $request->validate([
                'username' => 'required|unique:users|max:20',
                'password' => 'required|max:255',
                'id_role' => 'required|in:Dosen,Mahasiswa', // Memeriksa apakah 'role' adalah salah satu dari 'dosen' atau 'mahasiswa'
            ]);
            if ($validated['id_role'] == 'Dosen') {
                $validated['id_role'] = 2;
            } elseif ($validated['id_role'] == 'Mahasiswa') {
                $validated['id_role'] = 3;
            }
            // Jika validasi gagal, kembali ke halaman registrasi dengan pesan error
            if (!$validated) {
            return redirect('register')
                ->withErrors($validated);
    }
               // Jika validasi gagal, kembali ke halaman registrasi dengan pesan error
            if ($validated) {
                // Buat pengguna dengan data yang telah divalidasi
                $users = User::create([
                    'username' => $validated['username'],
                    'password' => bcrypt($validated['password']), // Anda harus mengenkripsi password sebelum menyimpannya
                    'id_role' => $validated['id_role'],
                ]);

                // Redirect ke halaman tertentu setelah registrasi berhasil
                Session::flash('success', 'Registrasi berhasil! Silakan tunggu.');

                // Redirect ke halaman login
                return redirect('login');
            }
                }
        }
