<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function home()
    {
        // if (!session()->has('id')) {
        //     return redirect('/login')->with('error', 'Please login first.');
        // }
        $users = User::where('status', 1)->get();
        return view('customerpage.home', compact('users'));
    }
    public function admin_register(Request $request)
    {
        // $cfpassword = $request->cfpassword;
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email|max:255',
        //     'password' => 'required|string|min:6',
        //     'cfpass' => 'required|same:password'
        // ]);
        // $profileAdmin = $request->file('profileAdmin')->getClientOriginalName();
        // $request->file('profileAdmin')->move(public_path('uploads/admin/'), $profileAdmin);
        // $register->img = $profileAdmin;
        // dd($profileAdmin);

        $register = new Login();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = bcrypt($request->password); // It's important to hash passwords
        $register->created_at = now();
        $register->updated_at = now();
        $register->save();
        
        $request->session()->flash('success', 'Admin registered successfully');
        return redirect('/login');
        
    }
    public function admin_submit(Request $request)
    {
        $admin = Login::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Authentication passed
            $request->session()->put([
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'telegram' => $admin->telegram,
                'address' => $admin->address,
                'img' => $admin->img,
            ]);
            $request->session()->flash('success', 'Welcome back, ' . $admin->name . '!');
            return redirect('/');
        } else {
            // Authentication failed
            session()->flash('status', 'Invalid user or password');
            return redirect('/login');
        }
    }
    public function user_login(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);

        // Attempt to find user
        $user = User::where('email', $request->email)
            ->where('name', $request->name)
            ->first();

        // Check if user exists and password matches
        if ($user) {
            // Store user info in session
            $request->session()->put([
                'id' => $user->id,
                'name' => $user->name,
                // 'email' => $user->email,
                // 'phone' => $user->phone,
                // 'telegram' => $user->telegram,
                // 'address' => $user->address,
                // 'avatar' => $user->avatar,
            ]);

            return redirect('/')->with('success', 'Welcome back, ' . $user->name . '!');
        } else {
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }

    // Logout user

    public function update_admin($id)
    {
        $result = Login::where('id', $id)->first();
        return view('pages/update_admin', compact('result'));
        // return view('pages/update_admin');
    }
    public function update_admin_submit($id, Request $request)
    {
        $admin = Login::where('id', $id)->first();
        $admin->name = $request->fullname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->telegram = $request->telegram;
        $admin->address = $request->address;
        $admin->updated_at = now();

        session([
            'name' => $admin->name,
            'email' => $admin->email,
            'phone' => $admin->phone,
            'telegram' => $admin->telegram,
            'address' => $admin->address,
        ]);

        if ($admin->update()) {
            return redirect('/')->with('success', 'Admin updated successfully!');
        } else {
            return back()->with('error', 'Admin update failed.');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush(); // clears all session data
        return redirect('/login');
    }
    public function user_logout(Request $request)
    {
        $request->session()->flush(); // clears all session data
        return redirect('/login');
    }
    public function update_img_admin($id)
    {
        $result = Login::where('id', $id)->first();
        if ($result) {
            return redirect('/update_admin');
        } else {
            return redirect('/');
        }
    }
}
