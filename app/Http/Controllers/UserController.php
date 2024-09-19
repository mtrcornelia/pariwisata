<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.register',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create',[
            'users' => User::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $namaFile='img_'.time().'_'.$request->profile_photo->getClientOriginalName();
            $request->profile_photo->move('images',$namaFile);
        }
        else {
            $namaFile='';
        }
        

        $hashedPassword = Hash::make($validateData['password']);
        $validateData['profile_photo'] = $namaFile;

        $user = new User;
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = $hashedPassword;
        $user->profile_photo = $validateData['profile_photo'];
        $user->save();

       
        // Kirim event Registered untuk mengirim email verifikasi
        event(new Registered($user));

        // Autentikasi pengguna
        Auth::login($user);

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended('/login');
        }
        return redirect('/email/verify');
    }

    
    
}
