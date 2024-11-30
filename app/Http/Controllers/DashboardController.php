<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function indexDash()
    {
        // Total number of students
        $totalStudents = DB::table('i_d_cards')->count();

        // Active IDs based on future expiry date
        $activeIDs = DB::table('i_d_cards')
            ->where('expiry_date', '>', Carbon::now())
            ->count();
            dd($totalStudents);

        // Pass variables to the view
        return view('dashboard', compact('totalStudents', 'activeIDs'));
    }
}
