<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }
    public function LoginAuth(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
    ]);

    // Attempt login
    if (Auth::attempt($request->only('email', 'password'))) 
    {
        return redirect()->route('home'); // Redirect to home if successful
    }
    // Redirect back with error message
    return redirect()->back()->withErrors([
        'error' => 'Invalid email or password.', // Error to be displayed
    ])->withInput(); // Retain the input for user convenience
}


    public function registerSave()
    {
        return view('Auth.register');
    }

    public function home()
    {
        return view('Dashboard.home');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        
        $data= $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
    
        // Create a new user
        // $user= User::create($data);
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'role' => 'Admin', // Default role
        ]);
        if($user)
        {
            return redirect()->route('login');
        }
        else
            {
                return redirect()->route('register');
            }
    
       
    }
    // public function dashboardPage()
    // {
    //     // if(Auth::check())
    //     // {
    //     //     return view('dashbord.home');
    //     // }
        
    //     // else
    //     // {
    //     //     return redirect()->route('login');
    //     // }
    // }
    public function Logout()
    {
        Auth::logout();
         return redirect()->route('login');
    }
    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('students.delete_student', compact('student'));
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
