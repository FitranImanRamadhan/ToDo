<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user.register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password, 
        ]);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('user.login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $user = User::where('email', $request->email)->first();


        if ($user && $user->password === $request->password) {
            Auth::login($user); // Login user
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'password' => 'Wrong email or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user.password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = User::find(Auth::id());
        if ($user->password === $request->old_password) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $request->session()->regenerate();
            return back()->with('success', 'Password changed!');
        } else {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function index()
    {
        $title = "Data user";
        $users = User::orderBy('id', 'asc')->paginate(15);
        return view('users.index', compact(['users', 'title']));
    }

    public function create(Request $request)
    {
        $title = "Create User / Register";

        if ($request->isMethod('post')) {
            $request->validate([
                'nama' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'hak_akses' => 'required',
            ]);

            // Password tetap di-hash untuk user yang dibuat melalui create
            $user = User::create([
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'hak_akses' => $request->input('hak_akses'),
            ]);

            return redirect()->route('users.index')->with('success', 'User has been created and registered successfully.');
        }

        return view('users.create', compact(['title']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'hak_akses' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'hak_akses' => $request->hak_akses,
        ]);

        return redirect()->route('users.index')->with('success', 'User has been created successfully.');
    }

    public function edit(User $user)
    {
        $title = "Edit Data User";
        return view('users.edit', compact('user', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'hak_akses' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->hak_akses = $request->hak_akses;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
