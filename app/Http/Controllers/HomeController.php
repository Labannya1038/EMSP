<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
     {
         
         $tasks = Task::where('user_id', auth()->id())
                     ->where('due_date', '>=', Carbon::today()) 
                     ->orderBy('due_date') 
                     ->take(5) 
                     ->get();
 
         return view('user_dashboard', compact('tasks'));
     }
}
