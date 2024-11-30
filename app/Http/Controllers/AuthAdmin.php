<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthAdmin extends Controller
{
    //
    public function GenerateID()
    {
        return view('Dashboard.GenerateID');
    }
    public function printID()
    {
        return view('Dashboard.printID');
    }
    public function ViewID()
    {
        return view('Dashboard.ViewID');
    }
    public function ManageStudents()
    {
        $students=DB::table('i_d_cards')->get();
        return view('Dashboard.ManageStudents',['students'=>$students]);
    }
    public function manageSetting()
    {
        return view('Dashboard.manageSetting');
    }

    
        public function showStudents()
        {
            // Fetch data from the i_d_cards table
            $lists = DB::table('i_d_cards')->get();
            // dd($lists);
            return view('Dashboard.ViewID',['data1'=>$lists]);
   
            // Pass the data to the view
            // return view('Dashboard.ViewID', ['Data' => $lists]);
        }
        public function TestPage()
        {
            $lists = DB::table('i_d_cards')->get();   
            return view('test',['data1'=>$lists]);
        }
        public function editStudent($id)
        {
            $students=DB::table('i_d_cards')->where('id',$id)->first();
            return view('CRUD.Update',['student'=>$students],);
        }
        
        public function removeID_Details($id)
{
    // Using DB facade to retrieve a student record
    $student = DB::table('i_d_cards')->where('id', $id)->first();

    if ($student) {
        // To delete the record using DB facade:
        DB::table('i_d_cards')->where('id', $id)->delete();
    }

    return redirect()->route('ManageStudents');
}
        
        
    
}
