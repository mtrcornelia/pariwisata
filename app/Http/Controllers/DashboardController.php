<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        
       return view('backend.index',[
           'category' => Category::count(),
           'tour' => Tour::count(),
           'event' => Event::count(),
       ]);
    }
    public function edit(){
        return view('backend.profile',[
            'users' => User::all()
        ]);
    }
    

}
