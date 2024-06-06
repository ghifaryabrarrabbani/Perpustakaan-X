<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        return view('Halaman/profile');
    }
    
    public function index()
    {
        $users = User::whereIn('id_role', [2, 3])->where('status','active')->get();
        return view('Halaman/users',['user'=>$users]);
    }

    public function add()
    {
        $role = Role::all();
        $users = User::all();
        return view('Halaman/users-add',['user'=>$users,'role'=>$role]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:20',
            'password' => 'required|max:255',
            'id_role' => 'required|in:Admin,Dosen,Mahasiswa', // Validasi role
            'status' => 'required|in:Active,Inactive'
        ]);
    
        // Mengonversi 'id_role' dan 'status' menjadi format yang sesuai dengan database
        if ($validated['id_role'] == 'Admin') {
            $validated['id_role'] = 1;
        } elseif ($validated['id_role'] == 'Dosen') {
            $validated['id_role'] = 2;
        } elseif ($validated['id_role'] == 'Mahasiswa') {
            $validated['id_role'] = 3;
        };

        // Simpan data user
        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password')); // Menggunakan fungsi bcrypt untuk mengenkripsi password
        $user->id_role = $validated['id_role'];
        $user->status = $validated['status'];
        
        $user->save();
    
        return redirect('/users')->with('status', 'User Added Successfully');
    }

    public function registered(){
        $registeredUser = User::where('status', 'inactive')->get();
        return view('Halaman/users-registered',['registeredUser'=>$registeredUser]);
    }

    public function approve($slug){
        $users = User::where('slug', $slug)->first();
        $users->status = 'Active';
        $users->save();
        return redirect('/users-registered')->with('status', 'Approve User Added Successfully');
    }

    public function delete($slug)
    {
        $users= User::where('slug', $slug)->first();
        return view('Halaman/users-delete', ['user'=>$users]);
    }


    public function destroy($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->delete();
        return redirect('users')->with('status', 'User Banned Successfully');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'id_user'); // Menghubungkan user_id di tabel User dengan id_user di tabel Book
    }
    // public function edit($slug)
    // {
    //     $users = User::where('slug', $slug)->first();
    //     $role = Role::all();
    //     return view('Halaman/users-edit', ['user'=> $users, 'role'=>$role]);
    // }

    // public function update(Request $request, $slug)
    // {
    //     $validated = $request->validate([
    //         'username' => 'required|unique:users|max:20',
    //         'password' => 'required|max:255',
    //         'id_role' => 'required|in:Admin,Dosen,Mahasiswa', // Validasi role
    //         'status' => 'required|in:Active,Inactive'
    //     ]);
    
    //     // Mengonversi 'id_role' dan 'status' menjadi format yang sesuai dengan database
    //     if ($validated['id_role'] == 'Admin') {
    //         $validated['id_role'] = 1;
    //     } elseif ($validated['id_role'] == 'Dosen') {
    //         $validated['id_role'] = 2;
    //     } elseif ($validated['id_role'] == 'Mahasiswa') {
    //         $validated['id_role'] = 3;
    //     };

    //     $users = User::where('slug', $slug)->first();
    //     $users->slug =null;
    //     $users->update($request->all());
    //     return redirect('/users')->with('status', 'Users Updated Successfully');
    // }
}