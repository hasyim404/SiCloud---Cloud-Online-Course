<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Testimoni;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =
        [
            'user_active' => count(User::where('isactive', 1)->get()),
            'user_notActive' => count(User::where('isactive', 0)->get()),
            'course' => Course::count(),
            'feedback' => Feedback::count(),
            'testimoni' => Testimoni::orderBy('id', 'DESC')->paginate(6),
            'ar_status' => DB::table('users')
                            ->selectRaw('status, count(status) as jumlah')
                            ->groupBy('status')
                            ->get(), 
        ];
        

        return view('admin.dashboard.index', $data);
    }
        
}
    
