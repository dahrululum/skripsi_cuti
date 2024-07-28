<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Eloquent\Model;
use DB;
 
use App\Models\Elemen;
use App\Models\Nilai;
use App\Models\Refjenis;
use App\Models\Refwilayah;
use App\Models\Periode;
use App\Models\Admin;
 

use Session;
use Carbon;


class FrontController extends Controller
{
    //
    public $layout = 'layouts.frontend.main';
    public function index()
    {
        return view('site.index',[
                'layout' => $this->layout
                
              ]);
        
    }
    public function postLogin(Request $request)
    {
        // $this->validate($request, [
        //     'username' => 'required',
        //     'password' => 'required|min:5'
        // ]);
       
        $attempt = Auth::guard('admin')->attempt([
          'username' => $request->input('username'),
          'password' => $request->input('password')
        ]);

        if($attempt){
        //if (auth()->guard('admin')->attempt($request->only('username', 'password'))) {
          
            $request->session()->regenerate();
            
            return redirect()->intended('/admin');
            
        } else {
            
            /*    
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
                */
                return back()->withErrors([
                    'username' => 'Username tidak sesuai, silahkan ulangi.',
                    'password' => 'Password tidak sesuai.',
                ]);
        }
    }
}
