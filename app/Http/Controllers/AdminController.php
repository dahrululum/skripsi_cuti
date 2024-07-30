<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

use Illuminate\Database\Eloquent\Model;
use DB;
 
use App\Models\Unitkerja;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\Jeniscuti;
use App\Models\Pangkat;
 
use App\Models\Admin;
use App\Models\Ajucuti;
use App\Models\Pegawai;
use App\Models\Fppc;

use Session;
use Carbon;

class AdminController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function index()
    {
     

        if(Auth::guard('admin')->check()){  
            return view('admin.dashboard',[
              'layout' => $this->layout,
              
            ]);
          }else{
            return view('admin.login',[
              'layout' => $this->layout 
            ]);
          }
        
    
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
    public function postLogout()
    {
        auth()->guard('admin')->logout();
        session()->flush();

        return redirect()->route('admin.login');
    }


    //12-12-2021
    //user
    public function useradmin(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                $users = Admin::Where('level',1)->get();
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.useradmin' , [
                    'layout' => $this->layout,
                    'pelamars' =>$users,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function adduseradmin()
    {
        if(Auth::guard('admin')->check()){  
       
            return view('admin/adduseradmin',[
            'layout' => $this->layout,
             
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAdduseradmin(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:admins',
        'username' => 'required', 
        'password' => 'required|min:6',
        ]);
         
        
        Admin::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password'])
          ]);
       
        return Redirect::to("/admin")->with('success','Selamat, Anda berhasil untuk melakukan Registrasi');
    }
    
    public function edituseradmin($id)
    {
        $us = Admin::where('id', $id)->first();
       
          return view('admin/edituseradmin',[
            'layout' => $this->layout,
            'user' =>$us    
             
        ]);

       // return view('register');
    }
    public function postEdituseradmin(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $email=$request->input('email');
                Admin::where('email', $email)
                ->update([
                    'name' => $request['name'],
                    'level' => $request['level'],
                    'username' => $request['username'],
                    
                
                
            ]);
        
                return Redirect::to("/admin")->with('success',' Edit User berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    //user pd
    public function userpd(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                $users = Admin::Where('level',2)->get();
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.userpd' , [
                    'layout' => $this->layout,
                    'pelamars' =>$users,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function adduserpd()
    {
        if(Auth::guard('admin')->check()){  
            $users = Admin::Where('level',2)->get();
            $allpd = Refwilayah::where('status',1)->get();
            return view('admin/adduserpd',[
            'layout' => $this->layout,
            'pel' =>$users,
            'insta'  =>$allpd, 
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAdduserpd(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:admins',
        'username' => 'required', 
        'password' => 'required|min:6',
        ]);
         
        
        Admin::create([
            'name'      => $request['name'],
            'username'  => $request['username'],
            'email'     => $request['email'],
            'level'     => $request['level'],
            'id_wilayah'    => $request['id_wilayah'],
            
            
            'password'  => Hash::make($request['password'])
          ]);
       
        return Redirect::to("/admin/userpd")->with('success','Selamat, Anda berhasil untuk melakukan Registrasi User');
    }
    
    public function edituserpd($id)
    {
        $us = Admin::where('id', $id)->first();
        $skpd = Refwilayah::where('id',$us->id_wilayah)->first();
        $allpd = Refwilayah::where('status',1)->get();

          return view('admin/edituserpd',[
            'layout' => $this->layout,
            'user'   =>$us,
            'skpd'  =>$skpd,  
            'insta'  =>$allpd, 
             
        ]);

       // return view('register');
    }
    public function postEdituserpd(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $email=$request->input('email');
                Admin::where('email', $email)
                ->update([
                    'name'        => $request['name'],
                    'level'       => $request['level'],
                    'username'    => $request['username'],
                    'id_wilayah'  => $request['id_wilayah'],
                    'password'    => Hash::make($request['password'])
                
                
            ]);
        
                return Redirect::to("/admin/userpd")->with('success',' Edit User berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function deluser($id)
    {
        if(Auth::guard('admin')->check()){      
             
            $user = Admin::where('id', $id)->first();
            $user->delete();
            return Redirect::to("/admin")->with('success',' Proses Delete berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
        
        
       
    }
    //utilitas
    //27 juli 2024
    public function unitkerja(){
      if(Auth::guard('admin')->check()){  
        $un = Unitkerja::all();

        return view('admin/unitkerja' , [
          'layout' => $this->layout,
          'un' =>$un,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addunitkerja()
    {
        if(Auth::guard('admin')->check()){  
              
            $maxValue = Unitkerja::max('kd_unitkerja');
            $nourut = $maxValue+1;
           
            return view('admin/addunitkerja',[
            'layout'  => $this->layout,
            'nourut'   => $nourut,
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddunitkerja(Request $request)
    {  
    
        
        Unitkerja::create([
            'kd_unitkerja'        => $request['kd_unitkerja'],
            'nm_unitkerja'        => $request['nm_unitkerja'],
            'alamat'              => $request['alamat'],
           
            
          ]);
       
        return Redirect::to("/admin/unitkerja")->with('success','Selamat, Anda berhasil untuk menambah Unitkerja');
    }

    public function editunitkerja($id)
    {
        $un = Unitkerja::where('kd_unitkerja', $id)->first();
         
          return view('admin/editunitkerja',[
            'layout' => $this->layout,
            'un'   =>$un,
           
        ]);

       // return view('register');
    }
    public function postEditunitkerja(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $kd=$request->input('kd_unitkerja');
                Unitkerja::where('kd_unitkerja', $kd)
                ->update([
                    'nm_unitkerja'        => $request['nm_unitkerja'],
                    'alamat'       => $request['alamat'],
                  
                
                
            ]);
        
                return Redirect::to("/admin/unitkerja")->with('success',' Edit Unitkerja berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    public function delunitkerja($id)
    {
        if(Auth::guard('admin')->check()){      
            $un = Unitkerja::where('kd_unitkerja', $id)->first();
            $un->delete();
            return Redirect::to("/admin/unitkerja")->with('success',' Proses Delete Unitkerja berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }

    //pangkat
    public function pangkat(){
      if(Auth::guard('admin')->check()){  
        $un = Pangkat::all();

        return view('admin/pangkat' , [
          'layout' => $this->layout,
          'un' =>$un,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addpangkat()
    {
        if(Auth::guard('admin')->check()){  
              
            $maxValue = Pangkat::max('kd_pangkat');
            $nourut = $maxValue+1;
           
            return view('admin/addpangkat',[
            'layout'  => $this->layout,
            'nourut'   => $nourut,
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddpangkat(Request $request)
    {  
    
        
        Pangkat::create([
            'kd_pangkat'        => $request['kd_pangkat'],
            'nm_pangkat'        => $request['nm_pangkat'],
            
            
          ]);
       
        return Redirect::to("/admin/pangkat")->with('success','Selamat, Anda berhasil untuk menambah Pangkat');
    }

    public function editpangkat($id)
    {
        $un = Pangkat::where('kd_pangkat', $id)->first();
         
          return view('admin/editpangkat',[
            'layout' => $this->layout,
            'un'   =>$un,
           
        ]);

       // return view('register');
    }
    public function postEditpangkat(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $kd=$request->input('kd_pangkat');
                Pangkat::where('kd_pangkat', $kd)
                ->update([
                    'nm_pangkat'        => $request['nm_pangkat'],
                  
                
                
            ]);
        
                return Redirect::to("/admin/pangkat")->with('success',' Edit pangkat berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    public function delpangkat($id)
    {
        if(Auth::guard('admin')->check()){      
            $un = Pangkat::where('kd_pangkat', $id)->first();
            $un->delete();
            return Redirect::to("/admin/pangkat")->with('success',' Proses Delete pangkat berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }

    //golongan
    public function golongan(){
      if(Auth::guard('admin')->check()){  
        $un = Golongan::all();

        return view('admin/golongan' , [
          'layout' => $this->layout,
          'un' =>$un,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addgolongan()
    {
        if(Auth::guard('admin')->check()){  
              
            $maxValue = Golongan::max('kd_golongan');
            $nourut = $maxValue+1;
           
            return view('admin/addgolongan',[
            'layout'  => $this->layout,
            'nourut'   => $nourut,
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddgolongan(Request $request)
    {  
    
        
        Golongan::create([
            'kd_golongan'        => $request['kd_golongan'],
            'nm_golongan'        => $request['nm_golongan'],
            
            
          ]);
       
        return Redirect::to("/admin/golongan")->with('success','Selamat, Anda berhasil untuk menambah golongan');
    }

    public function editgolongan($id)
    {
        $un = Golongan::where('kd_golongan', $id)->first();
         
          return view('admin/editgolongan',[
            'layout' => $this->layout,
            'un'   =>$un,
           
        ]);

       // return view('register');
    }
    public function postEditgolongan(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $kd=$request->input('kd_golongan');
                Golongan::where('kd_golongan', $kd)
                ->update([
                    'nm_golongan'        => $request['nm_golongan'],
                  
                
                
            ]);
        
                return Redirect::to("/admin/golongan")->with('success',' Edit golongan berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    public function delgolongan($id)
    {
        if(Auth::guard('admin')->check()){      
            $un = Golongan::where('kd_golongan', $id)->first();
            $un->delete();
            return Redirect::to("/admin/golongan")->with('success',' Proses Delete golongan berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }

    //jabatan
    public function jabatan(){
      if(Auth::guard('admin')->check()){  
        $un = Jabatan::all();

        return view('admin/jabatan' , [
          'layout' => $this->layout,
          'un' =>$un,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addjabatan()
    {
        if(Auth::guard('admin')->check()){  
              
            $maxValue = Jabatan::max('kd_jabatan');
            $nourut = $maxValue+1;
           
            return view('admin/addjabatan',[
            'layout'  => $this->layout,
            'nourut'   => $nourut,
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddjabatan(Request $request)
    {  
    
        
        Jabatan::create([
            'kd_jabatan'        => $request['kd_jabatan'],
            'nm_jabatan'        => $request['nm_jabatan'],
            
            
          ]);
       
        return Redirect::to("/admin/jabatan")->with('success','Selamat, Anda berhasil untuk menambah jabatan');
    }

    public function editjabatan($id)
    {
        $un = Jabatan::where('kd_jabatan', $id)->first();
         
          return view('admin/editjabatan',[
            'layout' => $this->layout,
            'un'   =>$un,
           
        ]);

       // return view('register');
    }
    public function postEditjabatan(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $kd=$request->input('kd_jabatan');
                Jabatan::where('kd_jabatan', $kd)
                ->update([
                    'nm_jabatan'        => $request['nm_jabatan'],
                  
                
                
            ]);
        
                return Redirect::to("/admin/jabatan")->with('success',' Edit jabatan berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    public function deljabatan($id)
    {
        if(Auth::guard('admin')->check()){      
            $un = Jabatan::where('kd_jabatan', $id)->first();
            $un->delete();
            return Redirect::to("/admin/jabatan")->with('success',' Proses Delete jabatan berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }
    
    //jenis_cuti
    public function jeniscuti(){
      if(Auth::guard('admin')->check()){  
        $un = Jeniscuti::all();

        return view('admin/jeniscuti' , [
          'layout' => $this->layout,
          'un' =>$un,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addjeniscuti()
    {
        if(Auth::guard('admin')->check()){  
              
            $maxValue = Jeniscuti::max('kd_jenis_cuti');
            $nourut = $maxValue+1;
           
            return view('admin/addjeniscuti',[
            'layout'  => $this->layout,
            'nourut'   => $nourut,
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddjeniscuti(Request $request)
    {  
    
        
        Jeniscuti::create([
            'kd_jenis_cuti'        => $request['kd_jenis_cuti'],
            'nm_jenis_cuti'        => $request['nm_jenis_cuti'],
            
            
          ]);
       
        return Redirect::to("/admin/jeniscuti")->with('success','Selamat, Anda berhasil untuk menambah jenis_cuti');
    }

    public function editjeniscuti($id)
    {
        $un = Jeniscuti::where('kd_jenis_cuti', $id)->first();
         
          return view('admin/editjeniscuti',[
            'layout' => $this->layout,
            'un'   =>$un,
           
        ]);

       // return view('register');
    }
    public function postEditjeniscuti(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $kd=$request->input('kd_jenis_cuti');
                Jeniscuti::where('kd_jenis_cuti', $kd)
                ->update([
                    'nm_jenis_cuti'        => $request['nm_jenis_cuti'],
                  
                
                
            ]);
        
                return Redirect::to("/admin/jeniscuti")->with('success',' Edit jenis_cuti berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    public function deljeniscuti($id)
    {
        if(Auth::guard('admin')->check()){      
            $un = Jeniscuti::where('kd_jenis_cuti', $id)->first();
            $un->delete();
            return Redirect::to("/admin/jeniscuti")->with('success',' Proses Delete jeniscuti berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }
    
    //pegawai
    public function pegawai(){
      if(Auth::guard('admin')->check()){  
        $un = Pegawai::all();

        return view('admin/pegawai' , [
          'layout' => $this->layout,
          'un' =>$un,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addpegawai()
    {
        if(Auth::guard('admin')->check()){  
              
          $un = Unitkerja::all();
          $pa = Pangkat::all();
          $jab = Jabatan::all();
          $gol = Golongan::all();
          
            $maxValue = Pegawai::max('id_pegawai');
            $nourut = $maxValue+1;
           
            return view('admin/addpegawai',[
            'layout'  => $this->layout,
            'nourut'   => $nourut,
            'un'   => $un,
            'pa'   => $pa,
            'jab'   => $jab,
            'gol'   => $gol,
            
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddpegawai(Request $request)
    {  
    
        
      Pegawai::create([
        'id_pegawai'          => $request['id_pegawai'],
        'nama_pegawai'        => $request['nama_pegawai'],
        'nip'                 => $request['nip'],
       
        'masa_kerja'          => $request['masa_kerja'],
        'jenkel'              => $request['jenkel'],
        'alamat'              => $request['alamat'],
        'nohp'                => $request['nohp'],
        'username'            => $request['username'],
        'password'            => Hash::make($request['password']),
        'kd_pangkat'          => $request['kd_pangkat'],
        'kd_jabatan'          => $request['kd_jabatan'],
        'kd_golongan'         => $request['kd_golongan'],
        'kd_unitkerja'        => $request['kd_unitkerja'],    
            
          ]);
          Admin::create([
            'id_admin' => $request['id_pegawai'],
            'username' => $request['nip'],
            'level' => 2,
            'password' => Hash::make($request['password'])
          ]);
        return Redirect::to("/admin/pegawai")->with('success','Selamat, Anda berhasil untuk menambah pegawai');
    }

    public function editpegawai($id)
    {
        $peg = Pegawai::where('id_pegawai', $id)->first();
        $un = Unitkerja::all();
        $pa = Pangkat::all();
        $jab = Jabatan::all();
        $gol = Golongan::all();

          return view('admin/editpegawai',[
            'layout' => $this->layout,
            'peg'   =>$peg,
            'un'   => $un,
            'pa'   => $pa,
            'jab'   => $jab,
            'gol'   => $gol,
           
        ]);

       // return view('register');
    }
    public function postEditpegawai(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $kd=$request->input('id_pegawai');
                Pegawai::where('id_pegawai', $kd)
                ->update([
                    'nama_pegawai'        => $request['nama_pegawai'],
                    'nip'                 => $request['nip'],
                    'masa_kerja'          => $request['masa_kerja'],
                    'jenkel'              => $request['jenkel'],
                    'alamat'              => $request['alamat'],
                    'nohp'                => $request['nohp'],
                    'kd_pangkat'          => $request['kd_pangkat'],
                    'kd_jabatan'          => $request['kd_jabatan'],
                    'kd_golongan'         => $request['kd_golongan'],
                    'kd_unitkerja'        => $request['kd_unitkerja'], 
                     
                
                
            ]);
        
                return Redirect::to("/admin/pegawai")->with('success',' Edit pegawai berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }

    public function delpegawai($id)
    {
        if(Auth::guard('admin')->check()){      
            $peg = Pegawai::where('id_pegawai', $id)->first();
            $peg->delete();
            $adm = Admin::where('id_admin', $id)->first();
            $adm->delete();
            return Redirect::to("/admin/pegawai")->with('success',' Proses Delete pegawai berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
       
    }
    
    //aju cuti 
    // 28 juli 2024
    public function ajucuti(){
      if(Auth::guard('admin')->check()){  
        $jc = Jeniscuti::all();
        $jab = Jabatan::all();
        $un = Unitkerja::all();
        $pa = Pangkat::all();
        $gol = Golongan::all();
        $peg = Pegawai::all();
        $aju = Ajucuti::all();
        

        return view('admin/ajucuti' , [
          'layout'  => $this->layout,
          'un'      => $un,
          'jab'     => $jab,
          'pa'      => $pa,
          'gol'     => $gol,
          'peg'     => $peg,
          'jc'      => $jc,
          'aju'     => $aju,
          
         
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addajucuti()
    {
        if(Auth::guard('admin')->check()){  
          $levuser= Auth::guard('admin')->user()->level;
          $iduser= Auth::guard('admin')->user()->id_admin;
          if($levuser==1){
            $peg = Pegawai::all();
          }else{
            $peg = Pegawai::where('id_pegawai',$iduser)->first();
          }
          
          $jc = Jeniscuti::all();
          $jab = Jabatan::all();
          $un = Unitkerja::all();
          $pa = Pangkat::all();
          $gol = Golongan::all();
          
            $maxValue = Ajucuti::max('id');
            $nourut = $maxValue+1;
           
            return view('admin/addajucuti',[
            'layout'    => $this->layout,
            'nourut'    => $nourut,
            'peg'       => $peg,
            'jc'        => $jc,
            'levuser'   => $levuser,
            'iduser'   => $levuser,
            'un'      => $un,
            'jab'     => $jab,
            'pa'      => $pa,
            'gol'     => $gol,

           
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddajucuti(Request $request)
    {  
      $uniqid=uniqid();
        
      Ajucuti::create([
        'id_pegawai'          => $request['id_pegawai'],
        'no_pc'               => $request['nopc'],
        'tgl_pc'              => $request['tglpc'],
        'jenis_cuti'          => $request['jenis_cuti'],
        'alias'               => $uniqid,
        'tgl_mulai'           => $request['tglawal'],
        'tgl_selesai'         => $request['tglakhir'],
        'lama_cuti'           => $request['lamacuti'],
        'alamat_cuti'         => $request['alamatcuti'],
        'alasan'              => $request['alasancuti'],
       
            
          ]);
         
        return Redirect::to("/admin/ajucuti")->with('success','Selamat, Anda berhasil untuk menambah permohonan cuti pegawai');
    }

    public function printajucuti($id)
    {
        if(Auth::guard('admin')->check()){  
                $hs = Ajucuti::where('id',$id)->first();
                $idaju=$hs->id;
                $tglawal=$hs->tgl_mulai;
                $tglakhir=$hs->tgl_selesai;
                $tglawal1 = $tglawal." 00:00:00";
                $tglakhir1 = $tglakhir." 23:59:00";


             

                return view('admin.print_ajucuti' , [
                    'layout'        => $this->layout,
                    'hs'            => $hs,
                   
                    'tglawal'       => $tglawal,
                    'tglakhir'      => $tglakhir,
                     
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }

    //fppc  
    // 29 juli 2024
    public function verifikasicuti(){
      if(Auth::guard('admin')->check()){  
        $jc = Jeniscuti::all();
        $jab = Jabatan::all();
        $un = Unitkerja::all();
        $pa = Pangkat::all();
        $gol = Golongan::all();
        $peg = Pegawai::all();
        $aju = Ajucuti::all();
        $fppc = Fppc::all();
        

        return view('admin/verifikasicuti' , [
          'layout'    => $this->layout,
          'un'        => $un,
          'jab'       => $jab,
          'pa'        => $pa,
          'gol'       => $gol,
          'peg'       => $peg,
          'jc'        => $jc,
          'aju'       => $aju,
          'fppc'      => $fppc,
          
         
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }

    public function addfppc()
    {
        if(Auth::guard('admin')->check()){  
          $levuser= Auth::guard('admin')->user()->level;
          $iduser= Auth::guard('admin')->user()->id_admin;
          if($levuser==1){
            $peg = Pegawai::all();
          }else{
            $peg = Pegawai::where('id_pegawai',$iduser)->first();
          }
          
          $jc = Jeniscuti::all();
          $jab = Jabatan::all();
          $un = Unitkerja::all();
          $pa = Pangkat::all();
          $gol = Golongan::all();
          $aju = Ajucuti::all();
            $maxValue = Fppc::max('id');
            $nourut = $maxValue+1;
           
            return view('admin/addfppc',[
            'layout'    => $this->layout,
            'nourut'    => $nourut,
            'peg'       => $peg,
            'jc'        => $jc,
            'levuser'   => $levuser,
            'iduser'   => $levuser,
            'un'      => $un,
            'jab'     => $jab,
            'pa'      => $pa,
            'gol'     => $gol,
            'aju'       => $aju,

           
            
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddfppc(Request $request)
    {  
      $uniqid=uniqid();
        
      Fppc::create([
        'no_fppc'                 => $request['nofppc'],
        'tgl_fppc'                => $request['tglfppc'],
        'no_pc'                   => $request['nopc'],
        'catatan_cuti'            => $request['catatan_cuti'],
        'atasan_langsung'         => $request['atasan_langsung'],
        'catatan_atasan'          => $request['catatan_atasan'],
         
            
          ]);
         
        return Redirect::to("/admin/verifikasicuti")->with('success','Selamat, Anda berhasil untuk menambah FPPC');
    }
    //print fpppc
    public function printfppc($id)
    {
        if(Auth::guard('admin')->check()){  
                $hs = Fppc::where('id',$id)->first();
                $idaju=$hs->id;
                $tglawal=$hs->tgl_mulai;
                $tglakhir=$hs->tgl_selesai;
                $tglawal1 = $tglawal." 00:00:00";
                $tglakhir1 = $tglakhir." 23:59:00";


             

                return view('admin.print_fppc' , [
                    'layout'        => $this->layout,
                    'hs'            => $hs,
                 
                     
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }

    public function dialogcarinopc()
    {
          if(Auth::guard('admin')->check()){  
            
            $aju = Ajucuti::all();
              //return view('/pelamar/datatable', compact('pelamars'));
                  return view('admin.dialog_cari_nopc' , [
                      'layout' => $this->layout,
                      'aju'       => $aju,
                      
                       
                       
              ]);
          }else{
                  return view('admin.login',[
                      'layout' => $this->layout 
                    ]);
                  }
    }
    public function detailpegawai($idpegawai,$nopc)
    {
          if(Auth::guard('admin')->check()){  
            $pc= ajucuti::where('no_pc',$nopc)->first();

            $peg = Pegawai::where('id_pegawai',$idpegawai)->first();
              //return view('/pelamar/datatable', compact('pelamars'));
                  return view('admin.detail_pegawai' , [
                      'layout'    => $this->layout,
                      'peg'       => $peg,
                      'pc'        => $pc,
                      
                       
                       
              ]);
          }else{
                  return view('admin.login',[
                      'layout' => $this->layout 
                    ]);
                  }
    }
    public function dialogriwayatcuti($idpegawai,$nopc)
    {
          if(Auth::guard('admin')->check()){  
            
            $aju = Ajucuti::where('id_pegawai',$idpegawai)
                            ->where('no_pc','!=',$nopc)
                            ->get();
            $peg = Pegawai::where('id_pegawai',$idpegawai)->first();
              //return view('/pelamar/datatable', compact('pelamars'));
                  return view('admin.dialog_riwayatcuti' , [
                      'layout'        => $this->layout,
                      'aju'           => $aju,
                      'nopc'          => $nopc,
                      'idpegawai'     => $idpegawai,
                      'peg'           => $peg,
                         
                       
              ]);
          }else{
                  return view('admin.login',[
                      'layout' => $this->layout 
                    ]);
                  }
    }
    //rekapcuti
    public function rekapcuti(){
      if(Auth::guard('admin')->check()){  
      
        $fppc = Fppc::all();
        

        return view('admin/rekapcuti' , [
          'layout'  => $this->layout, 
          'fppc'     => $fppc,
          
         
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function printrekapcuti(){
      if(Auth::guard('admin')->check()){  
      
        $fppc = Fppc::all();
        

        return view('admin/print_rekapcuti' , [
          'layout'  => $this->layout, 
          'fppc'     => $fppc,
          
         
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
