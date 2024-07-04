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
 
use App\Models\Elemen;
use App\Models\Nilai;
use App\Models\Refjenis;
use App\Models\Refwilayah;
use App\Models\Periode;
 
use App\Models\Admin;
use App\Models\Publikasi;
use App\Models\Weblink;

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
          }
          return view('admin.login',[
            'layout' => $this->layout 
          ]);
    
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
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
                    'email' => 'Username/Email tidak sesuai, silahkan ulangi.',
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
    //wilayah
    //10 juni 2024
    public function wilayah(){
      if(Auth::guard('admin')->check()){  
        $wil = Refwilayah::where('status',1)->get();

        return view('admin/wilayah' , [
          'layout' => $this->layout,
          'wils' =>$wil,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function jenis(){
      if(Auth::guard('admin')->check()){  
        $jen = Refjenis::where('status',1)->get();

        return view('admin/jenis' , [
          'layout' => $this->layout,
          'jens' =>$jen,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    //elemen
    //24 Juni 2024
    public function elemen(){
      if(Auth::guard('admin')->check()){  
        $elemens = Elemen::Where(
          [
            ['id_induk','=',"0"],
            ['status_aktif','=',1],
           
          ])->orderBy('id_induk')->get();

        return view('admin/elemen' , [
          'layout' => $this->layout,
          'el' =>$elemens,
         
        ]);
      }else{
        return view('admin.login',[
            'layout' => $this->layout 
          ]);
        }
    }
    public function addelemen()
    {
        if(Auth::guard('admin')->check()){  
            $users = Admin::Where('level',2)->get();
            $alias = uniqid();
            $jen = Refjenis::where('status',1)->get();
            $elemens = Elemen::Where(
              [
                ['id_induk','=',"0"],
                ['status_aktif','=',1],
               
              ])->orderBy('id_induk')->get();
            return view('admin/addelemen',[
            'layout'  => $this->layout,
            'alias'   => $alias,
            'jenis'     => $jen,
            'el'      => $elemens, 
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddelemen(Request $request)
    {  
    
        
        Elemen::create([
            'nama'                  => $request['nama'],
            'alias'                 => $request['alias'],
            'id_induk'              => $request['id_induk'],
            'id_jenis'              => $request['id_jenis'],
            'sumber'                => $request['sumber'],
            'ket'                   => $request['ket'],
            'status_verifikasi'     => 1,
            'status_aktif'          => 1,
            
          ]);
       
        return Redirect::to("/admin/elemen")->with('success','Selamat, Anda berhasil untuk menambah elemen data');
    }
    public function editelemen($id)
    {
        $el = Elemen::where('id', $id)->first();
        $jen = Refjenis::where('status',1)->get();
        $elemens = Elemen::Where(
          [
            ['id_induk','=',"0"],
            ['status_aktif','=',1],
           
          ])->orderBy('id_induk')->get();

          return view('admin/editelemen',[
            'layout'    => $this->layout,
            'pel'       => $el,
            'jenis'     => $jen,  
            'elemens'   => $elemens, 
             
        ]);

       // return view('register');
    }
    public function postEditelemen(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $idna=$request->input('idna');
                Elemen::where('id', $idna)
                ->update([
                  'nama'                  => $request['nama'],
                  'id_induk'              => $request['id_induk'],
                  'id_jenis'              => $request['id_jenis'],
                  'sumber'                => $request['sumber'],
                  'ket'                   => $request['ket'],
                  'status_verifikasi'     => 1,
                  'status_aktif'          => 1,
                
                
            ]);
        
                return Redirect::to("/admin/elemen")->with('success',' Edit Elemen berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function delelemen($id)
    {
        if(Auth::guard('admin')->check()){      
             
            $el = Elemen::where('id', $id)->first();
            // if($el->id_induk==0){

            // }else{

            // }


            $el->delete();
            return Redirect::to("/admin/elemen")->with('success',' Proses Delete Elemen berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
        
        
       
    }
    //nilai
    //25 juni 2024
    public function nilai(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                $levuser=Auth::guard('admin')->user()->level;  
                if($levuser==2){
                  $idwilayah=Auth::guard('admin')->user()->id_wilayah;
                  $refwil = Refwilayah::where('id',$idwilayah)->first();
                  $nmwilayah = $refwil->namawilayah;
                }else{
                  $idwilayah="";
                  $nmwilayah="";
                }
                

                $per = Periode::where('status',1)->first();
                $wil = Refwilayah::all();
                $jen = Refjenis::where('status',1)->get();

                $params = $request->query();
                if(!empty($params)){
                    if(!empty($params['id_wilayah'])){$id_wilayah=$params['id_wilayah'];}else{$id_wilayah="";}
                    if(!empty($params['id_jenis'])){$id_jenis=$params['id_jenis'];}else{$id_jenis="";}
                    if(!empty($params['tahun'])){$tahun=$params['tahun'];}else{$tahun="";}
                    
    
                    $arrpar="?id_wilayah=".$id_wilayah."&id_jenis=".$id_jenis."&tahun=".$tahun;
                
                }else{
                    $arrpar="";
                }

                
                  
                $queryEL = Elemen::query($params);

                //$queryEL->latest();
                //$allEL = $queryEL->paginate(10);
                $model = $queryEL->get();

             

            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.nilai' , [
                    'layout'        => $this->layout,
                    'periode'       => $per,
                    'wilayah'       => $wil,
                    'jenis'         => $jen,
                    'params'        => $params,
                    'arrpar'        => $arrpar,
                    'el'            => $model,
                    'levuser'       => $levuser,
                    'idwilayah'     => $idwilayah,
                    'nmwilayah'     => $nmwilayah,
                    
                 

                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function postNilaielemen(Request $request)
    {  
      $alias = uniqid();
      $id_jenis = $request['id_jenis'];
      $id_wilayah = $request['id_wilayah'];
      $tahun = $request['tahun'];
      
      $que = Elemen :: where('id_jenis',$id_jenis)->count();
      // $queryEL = Elemen::query($id_jenis);
      //cek table
      
      
      // $model = $queryEL->get();
      //dd($que);                 
      //dd($request['id_jenis']);
      foreach( $_POST as $stuff => $val ) {
        $idelement=substr_replace($stuff,'','0',9);
        $nelement=substr_replace($stuff,'','0',5);
        //  echo $stuff; echo":"; echo $val;
        //   echo"<br>";
        //dd($_POST);

        
         
        if(strpos($stuff, 'nilai') !== false  ){
          $nmsumber = "sumber".$nelement;
          $varsumber = $_POST[$nmsumber];
          $nmket = "ket".$nelement;
          $varket = $_POST[$nmket];

        //  echo" ## "; echo $alias; echo " | ";  echo"value :"; echo $val; echo" - idjenis:"; echo $id_jenis; echo"- idwilayah :"; echo $id_wilayah; echo"- tahun:"; echo $tahun; echo"- sumber:".$varsumber; echo"- ket:".$varket; 
        //   echo"<br>";
         
          $cekque = Nilai::Where(
            [
              ['id_elemen','=',$nelement],
              ['id_jenis','=',$id_jenis],
              ['id_wilayah','=',$id_wilayah],
              ['tahun','=',$tahun],
            ])->count();


         if(empty($cekque)){
          //insert
              Nilai::create([
                'alias'                 => $alias,
                'id_elemen'             => $nelement,
                'id_wilayah'            => $id_wilayah,
                'id_jenis'              => $id_jenis,
                'tahun'                 => $tahun,
                'nilai'                 => $val,
                'sumber'                => $varsumber,
                'ket'                   => $varket,
                
                'status_aktif'          => 1,
                'status_verifikasi'     => 1,
                
                
              ]);
         }else{
          //update
            Nilai::where(
              [
                ['id_jenis','=',$id_jenis],
                ['id_wilayah','=',$id_wilayah],
                ['id_elemen','=',$nelement],
                ['tahun','=',$tahun],
                
              ]
            )
                ->update([
                  
                  'nilai'                 => $val,
                  'sumber'                => $varsumber,
                  'ket'                   => $varket,
               
            ]);
         }
          

        }

      }
     
      return Redirect::to("/admin/nilai")->with('success','Selamat, Anda berhasil simpan data NIlai Elemen');       
         
    }
    //laporan
    public function laporan(Request $request)
    {
      if(Auth::guard('admin')->check()){  
        $levuser=Auth::guard('admin')->user()->level;  
        if($levuser==2){
          $idwilayah=Auth::guard('admin')->user()->id_wilayah;
          $refwil = Refwilayah::where('id',$idwilayah)->first();
          $nmwilayah = $refwil->namawilayah;
        }else{
          $idwilayah="";
          $nmwilayah="";
        }

        $per = Periode::where('status',1)->first();
        $wil = Refwilayah::all();
        $jen = Refjenis::where('status',1)->get();

        $params = $request->query();
        if(!empty($params)){
            if(!empty($params['id_wilayah'])){$id_wilayah=$params['id_wilayah'];}else{$id_wilayah="";}
            if(!empty($params['id_jenis'])){$id_jenis=$params['id_jenis'];}else{$id_jenis="";}
            if(!empty($params['tahun'])){$tahun=$params['tahun'];}else{$tahun="";}
            

            $arrpar="?id_wilayah=".$id_wilayah."&id_jenis=".$id_jenis."&tahun=".$tahun;
        
        }else{
            $arrpar="";
        }

        
          
        $queryEL = Elemen::queryreport($params);

        //$queryEL->latest();
        //$allEL = $queryEL->paginate(10);
        $model = $queryEL->get();

        return view('admin.laporan' , [
          'layout' => $this->layout,
          'periode'       => $per,
          'wilayah'       => $wil,
          'jenis'         => $jen,
          'params'        => $params,
          'arrpar'        => $arrpar,
          'el'            => $model,
          'levuser'       => $levuser,
          'idwilayah'     => $idwilayah,
          'nmwilayah'     => $nmwilayah,
           
        ]);

      }else{
        return view('admin.login',[
          'layout' => $this->layout 
        ]);
      }
    
    
    }


    //periode
    public function periode(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                $per = Periode::all();
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.periode' , [
                    'layout' => $this->layout,
                    'periode' =>$per,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function periodestatus( request $request){
       
      $idna = $request->get('idna');
      $sp = $request->get('statuspage');
      if ($sp == "true") {
          Periode::where('id', $idna)
              ->update([
                  'status' => 1,
              ]);
          Periode::where('id','!=',$idna)
                ->update(
                  ['status' => 0,]  
                );
      } else {
          Periode::where('id', $idna)
              ->update([
                  'status' => 0,
              ]);
      }

      return response()->json(['success' => 'Halaman Periode Berhasil diedit']);


  }

  //publikasi
  public function publikasi(request $request){
    if(Auth::guard('admin')->check()){  
      $pub = Publikasi::orderBy('id')->get();

      return view('admin/publikasi' , [
        'layout' => $this->layout,
        'pub' =>$pub,
       
      ]);
    }else{
      return view('admin.login',[
          'layout' => $this->layout 
        ]);
      }
  }
  public function dialoguploadpub($id, $label)
  {
        if(Auth::guard('admin')->check()){  
                
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.dialog_uploadpub' , [
                    'layout' => $this->layout,
                    'uniqid'  =>$id,
                    'label'     =>$label
                    
                     
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
  }
  public function uploadactionpub(Request $request)
    {
        $validation = Validator::make($request->all(), [
        'select_file' => 'required|mimes:jpeg,png,jpg,pdf,docx,xlsx,doc|max:20748'
        ]);
        if($validation->passes())
        {
            $uniqid   =   $request->input('uniqid');
            $label    =   $request->input('label');
            
            $image = $request->file('select_file');

            $nama_file = "file_".$label."_".$uniqid.".".$image->getClientOriginalExtension();  
            $tujuan_upload = 'downloads';
            $image->move($tujuan_upload,$nama_file);

            //Storage::disk('downloads') -> put($nama_file, file_get_contents($image->getRealPath()));

             
            return response()->json([
                'message'   => 'Berkas Berhasil di Upload',
                'uploaded_file' => '<input type="hidden" id="uploadfile" name="uploadfile" value="'.$nama_file.'"  />',
                'label_file' => '<input type="hidden" id="labelfile" name="labelfile" value="'.$label.'"  />',
                'uploaded_image' => '<a href="../downloads/'.$nama_file.'" class="btn btn-danger" target="_blank" >'.$nama_file.'</a>',
                'class_name'  => 'alert-success'
            ]);

                

        }
        else
        {
            return response()->json([
            'message'   => $validation->errors()->all(),
            'uploaded_image' => '',
            'class_name'  => 'alert-danger'
            ]);
        }
  }
  public function addpublikasi(Request $request)
  {
       $uniqid=uniqid();

          return view('admin/addpublikasi',[
            'layout'    => $this->layout,
            'alias'     => $uniqid,
           
             
        ]);

       // return view('register');
  }
  public function postAddpublikasi(Request $request)
    {  
    
        
        Publikasi::create([
            'alias'                  => $request['alias'],
            'judul'                  => $request['judul'],
            'deskripsi'              => $request['desk'],
            'file_foto'              => $request['namafilecover'],
            'file_download'          => $request['namafileunduh'],
            'tglinput'               => $request['tglupload'],
            'status'                 => 1,
            
            
          ]);
       
        return Redirect::to("/admin/publikasi")->with('success','Selamat, Anda berhasil untuk menambah Publikasi');
    }
    public function editpublikasi($id)
    {
        $pub = Publikasi::where('id', $id)->first();
        

          return view('admin/editpublikasi',[
            'layout'    => $this->layout,
            'alias'     => $pub->alias,
            'pub'       => $pub,
           
             
        ]);

       // return view('register');
    }
    public function postEditpublikasi(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $idna=$request->input('idna');
                Publikasi::where('id', $idna)
                ->update([
                  
                  'judul'                  => $request['judul'],
                  'deskripsi'              => $request['desk'],
                  'file_foto'              => $request['namafilecover'],
                  'file_download'          => $request['namafileunduh'],
                  'tglinput'               => $request['tglupload'],
                
                
            ]);
        
                return Redirect::to("/admin/publikasi")->with('success',' Edit Publikasi berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function delpublikasi($id)
    {
        if(Auth::guard('admin')->check()){      
             
            $pub = Publikasi::where('id', $id)->first();
           
            $pub->delete();
            return Redirect::to("/admin/publikasi")->with('success',' Proses Delete Publikasi berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
        
        
       
    }
    //INformasi - WEBLINK
    //28 juni 2024
    //publikasi
  public function weblink(request $request){
    if(Auth::guard('admin')->check()){  
      $pub = Weblink::orderBy('id')->get();

      return view('admin/weblink' , [
        'layout' => $this->layout,
        'pub' =>$pub,
       
      ]);
    }else{
      return view('admin.login',[
          'layout' => $this->layout 
        ]);
      }
  }
  public function dialoguploadwl($id, $label)
  {
        if(Auth::guard('admin')->check()){  
                
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.dialog_uploadwl' , [
                    'layout' => $this->layout,
                    'uniqid'  =>$id,
                    'label'     =>$label
                    
                     
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
  }
  public function uploadactionwl(Request $request)
    {
        $validation = Validator::make($request->all(), [
        'select_file' => 'required|mimes:jpeg,png,jpg,pdf,docx,xlsx,doc|max:20748'
        ]);
        if($validation->passes())
        {
            $uniqid   =   $request->input('uniqid');
            $label    =   $request->input('label');
            
            $image = $request->file('select_file');

            $nama_file = "file_".$label."_".$uniqid.".".$image->getClientOriginalExtension();  
            $tujuan_upload = 'downloads';
            $image->move($tujuan_upload,$nama_file);

            //Storage::disk('downloads') -> put($nama_file, file_get_contents($image->getRealPath()));

             
            return response()->json([
                'message'   => 'Berkas Berhasil di Upload',
                'uploaded_file' => '<input type="hidden" id="uploadfile" name="uploadfile" value="'.$nama_file.'"  />',
                'label_file' => '<input type="hidden" id="labelfile" name="labelfile" value="'.$label.'"  />',
                'uploaded_image' => '<a href="../downloads/'.$nama_file.'" class="btn btn-danger" target="_blank" >'.$nama_file.'</a>',
                'class_name'  => 'alert-success'
            ]);

                

        }
        else
        {
            return response()->json([
            'message'   => $validation->errors()->all(),
            'uploaded_image' => '',
            'class_name'  => 'alert-danger'
            ]);
        }
  }
  public function addweblink(Request $request)
  {
       $uniqid=uniqid();

          return view('admin/addweblink',[
            'layout'    => $this->layout,
            'alias'     => $uniqid,
           
             
        ]);

       // return view('register');
  }
  public function postAddweblink(Request $request)
    {  
    
        
        Weblink::create([
            'alias'                 => $request['alias'],
            'nama'                  => $request['nama'],
            'ket'                   => $request['ket'],
            'urlna'                 => $request['urlna'],
            'file_foto'             => $request['namafilecover'],
            'status'                => 1,
            
            
          ]);
       
        return Redirect::to("/admin/weblink")->with('success','Selamat, Anda berhasil untuk menambah weblink');
    }
    public function editweblink($id)
    {
        $pub = Weblink::where('id', $id)->first();
        

          return view('admin/editweblink',[
            'layout'    => $this->layout,
            'alias'     => $pub->alias,
            'pub'       => $pub,
           
             
        ]);

       // return view('register');
    }
    public function postEditweblink(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $idna=$request->input('idna');
                Weblink::where('id', $idna)
                ->update([
                  'nama'                  => $request['nama'],
                  'ket'                   => $request['ket'],
                  'urlna'                 => $request['urlna'],
                  'file_foto'             => $request['namafilecover'],
                
                
            ]);
        
                return Redirect::to("/admin/weblink")->with('success',' Edit weblink berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function delweblink($id)
    {
        if(Auth::guard('admin')->check()){      
             
            $pub = Weblink::where('id', $id)->first();
           
            $pub->delete();
            return Redirect::to("/admin/weblink")->with('success',' Proses Delete Weblink berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
        
        
       
    }


    //formasi jabatan
    //05 des 2021
    public function jabatan($id)
    {
        if(Auth::guard('admin')->check()){  
          $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          $inst = Instansi::Where('id_instansi_jenis',1)->first();
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['tanggal_selesai_aktif', '>=', date('Y-m-d')],
                    ['status_hapus','=',0],
                    
                    
                   
                  ]
            )->orderBy('id')->limit(1)->get();

            $jmlpeg=InstansiPegawai::where(
              [
                ['id_instansi','=',$id],
                ['tanggal_mulai', '<=', date('Y-m-d')],
                ['tanggal_selesai', '>=', date('Y-m-d')],
                ['status_hapus','=',0],

              ]
            )->count();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/jabatan' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab,
                    'insta' =>$allpd,
                    'pd'    =>$inst,
                    'jpeg'  =>$jmlpeg,
                    
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function formasijab($id)
    {
        if(Auth::guard('admin')->check()){  
          $lastyear = date("Y-m-d", strtotime("-1 year"));

          $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          $inst = Instansi::Where('id_instansi_jenis',1)->first();
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['tanggal_selesai_aktif', '>=', date('Y-m-d')],
                    ['status_hapus','=',0],
                   
                  ]
            )->orderBy('id')->limit(1)->get();

            $jmlpeg=InstansiPegawai::where(
              [
                ['id_instansi','=',$id],
                ['tanggal_mulai', '<=', date('Y-m-d')],
                ['tanggal_selesai', '>=', date('Y-m-d')],
                ['status_hapus','=',0],

              ]
            )->count();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/formasijabatan' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab,
                    'insta' =>$allpd,
                    'pd'    =>$inst,
                    'jpeg'  =>$jmlpeg,
                    'lastyear'  =>$lastyear,
                    
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function postEditFormasijab(Request $request)
    {
      $idinstansi=$request['idinstansi'];
      $lastyear = date("Y-m-d", strtotime("-1 year"));
      $now=date('Y-m-d');
       $idjab=$request['idjab'];
       $nilaik=$request['nilaiabk'];
       $statusjab=$request['statusjab'];

       foreach ($idjab as $key=> $value) { 
        $idna = $idjab[$key]; // or  $value;
        $nilaina = $nilaik[$key];
        $statusna = $statusjab[$key];
        if($statusna ==2){
          $tglna=$lastyear;
        }else{
          $tglna='9999-12-31';
        }
        
        Jabatan::where('id', $idna)
                ->update([
                    'jumlah_abk'                => $nilaina,
                    'tanggal_selesai_aktif'     => $tglna,
                    
                ]);

        //echo $idna; echo": "; echo $nilaina; echo"  "; echo $statusna; echo"= "; echo $tglna;
        //echo "<br>";


      }
      return Redirect::to("/admin/formasijab/".$idinstansi)->with('success','Selamat, Anda berhasil untuk merubah Formasi Jabatan');
      

    }


    //UTILITY - INSTANSI
    public function instansi(Request $request)
    {
        if(Auth::guard('admin')->check()){  
          $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();

            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/instansi' , [
                    'layout' => $this->layout,
                    'insta' =>$allpd,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //instansi
    public function addinstansi()
    {
        if(Auth::guard('admin')->check()){  
            $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            $skpd = Instansi::where('id_instansi_jenis',1)->with('uptd')->get();
            //if kosong pd pada saat entri baru
            $inst = Instansi::Where('id_instansi_jenis',1)->first();
            return view('admin/addinstansi',[
            'layout' => $this->layout,
            'skpd' =>$skpd, 
            'pd'    =>$inst,
            'insta'    =>$allpd,
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
            }        
       // return view('register');
    }
    public function postAddinstansi(Request $request)
    {  
        request()->validate([
        'nama' => 'required',
        'id_instansi_jenis' => 'required',
        ]);
         
        
        Instansi::create([
            'nama' => $request['nama'],
            'id_induk' => $request['id_induk'],
            'id_instansi_jenis' => $request['id_instansi_jenis'],
            'singkatan' => $request['singkatan'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telp'],
            'email' => $request['email'],
             
            
            
          ]);
       
        return Redirect::to("/admin/instansi")->with('success','Selamat, Instansi berhasil disimpan');
    }
    public function editinstansi($id)
    {
        //$us = Admin::where('id', $id)->first();
        $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
        $skpd = Instansi::where('id_instansi_jenis',1)->with('uptd')->get();
        $inst = Instansi::Where('id',$id)->first();
       
          return view('admin/editinstansi',[
            'layout' => $this->layout,
            'pd'    =>$inst,
            'insta'  =>$allpd,
                
             
        ]);

       // return view('register');
    }
    public function postEditinstansi(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $id=$request->input('idna');
                Instansi::where('id', $id)
                ->update([
                     
                    'nama' => $request['nama'],
                    'id_induk' => $request['id_induk'],
                    'id_instansi_jenis' => $request['id_instansi_jenis'],
                    'singkatan' => $request['singkatan'],
                    'alamat' => $request['alamat'],
                    'telepon' => $request['telp'],
                    'email' => $request['email'],
                
            ]);
        
                return Redirect::to("/admin/instansi")->with('success',' Edit Instansi berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function delinstansi($jenis, $id)
    {
        if(Auth::guard('admin')->check()){      
             
            $inst = Instansi::where('id', $id)->first();
            $inst->delete();
            return Redirect::to("/admin/instansi")->with('success',' Proses Delete berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
        
        
       
    }
    //strukturins
    public function strukins(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            $skpd = Instansi::where('id_instansi_jenis',1)->with('uptd')->get();

            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.strukins' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    
    
    //strukturorg - khusus jabatan
    public function strukorg(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            $skpd = Instansi::where('id_instansi_jenis',1)->with('uptd')->get();

            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/liststrukorg' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //detail strukturorg
    public function detailorg($id)
    {
        if(Auth::guard('admin')->check()){  
          $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          $inst = Instansi::Where('id_instansi_jenis',1)->first();
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['id_jenis_jabatan','=',1],
                    ['id_induk','=',118]
                     
                  ]
            )->orderBy('id')->get();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/detailstrukorg' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab,
                    'allpd' =>$allpd,
                    'pd'    =>$inst,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function detailuptd($id)
    {
        if(Auth::guard('admin')->check()){  
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['id_jenis_jabatan','=',1],
                    
                     
                  ]
            )->orderBy('id')->limit(1)->get();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/detailsouptd' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function detailcabdin($id)
    {
        if(Auth::guard('admin')->check()){  
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['id_jenis_jabatan','=',1],
                    
                     
                  ]
            )->orderBy('id')->limit(1)->get();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/detailsocabdin' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function detailsek($id)
    {
        if(Auth::guard('admin')->check()){  
            $skpd = Instansi::where('id',$id)->first();
            $jabs = Jabatan::Where(
              [
                  ['id_instansi','=',$id],
                  ['id_jenis_jabatan','=',2]
                  
              ]
          )->orderBy('id_induk')->limit(1)->get();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/detailsosek' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jabs
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //petajabatan
    public function petajab($id)
    {
        if(Auth::guard('admin')->check()){  
          $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          $inst = Instansi::Where('id_instansi_jenis',1)->first();
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['id_jenis_jabatan','=',1],
                    ['id_induk','=',118]
                     
                  ]
            )->orderBy('id')->get();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/detailpetajab' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab,
                    'allpd' =>$allpd,
                    'pd'    =>$inst,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function printpetajab($id)
    {
        if(Auth::guard('admin')->check()){  
          $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          $inst = Instansi::Where('id_instansi_jenis',1)->first();
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['id_jenis_jabatan','=',1],
                    ['id_induk','=',118]
                     
                  ]
            )->orderBy('id')->get();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/printpetajab' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab,
                    'allpd' =>$allpd,
                    'pd'    =>$inst,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //chart
    public function orgchart($id = null)
    {
        if(Auth::guard('admin')->check()){  
          $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          $inst = Instansi::Where('id_instansi_jenis',1)->first();
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['id_jenis_jabatan','=',1],
                    ['id_induk','=',118]
                     
                  ]
            )->orderBy('id')->get();
            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/strukturorg/orgchart' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab,
                    'allpd' =>$allpd,
                    'pd'    =>$inst,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }


    public function jabutama($pd = 1)
    {
        if(Auth::guard('admin')->check()){  
            $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            $inst = Instansi::Where('id_instansi_jenis',1)->first();

          if (is_null($pd)) {
            $skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          } else {
            $skpd = Instansi::Where(
              [
                  ['id','=',$pd],
                  ['id_instansi_jenis','=',1] 
                
                ])->get();
 
          }
   
            return view('admin/jabatan/jabutama',[
              'layout' => $this->layout,
              'skpd'        => $skpd,
              'allpd'       =>$allpd,
              'pd'          =>$inst,
            ]);
          }
          return view('admin.login',[
            'layout' => $this->layout 
          ]);
    
    }
    public function jabuptd($pd = null)
    {
        if(Auth::guard('admin')->check()){  
            $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            $inst = Instansi::Where('id_instansi_jenis',1)->first();

          if (is_null($pd)) {
            $skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          } else {
            $skpd = Instansi::Where(
              [
                  ['id','=',$pd],
                  ['id_instansi_jenis','=',1] 
                
                ])->get();
 
          }
   
            return view('admin/jabatan/jabuptd',[
              'layout' => $this->layout,
              'skpd'        => $skpd,
              'allpd'       =>$allpd,
              'pd'          =>$inst,
            ]);
          }
          return view('admin.login',[
            'layout' => $this->layout 
          ]);
    
    }
    public function jabcabdin($pd = null)
    {
        if(Auth::guard('admin')->check()){  
            $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            $inst = Instansi::Where('id_instansi_jenis',1)->first();

          if (is_null($pd)) {
            $skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          } else {
            $skpd = Instansi::Where(
              [
                  ['id','=',$pd],
                  ['id_instansi_jenis','=',1] 
                
                ])->get();
 
          }
   
            return view('admin/jabatan/jabcabdin',[
              'layout' => $this->layout,
              'skpd'        => $skpd,
              'allpd'       =>$allpd,
              'pd'          =>$inst,
            ]);
          }
          return view('admin.login',[
            'layout' => $this->layout 
          ]);
    
    }
    public function jabsekolah($pd = 33)
    {
        if(Auth::guard('admin')->check()){  
            $allpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            $inst = Instansi::Where('id_instansi_jenis',1)->first();

          if (is_null($pd)) {
            $skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
          } else {
            $skpd = Instansi::Where(
              [
                  ['id','=',$pd],
                  ['id_instansi_jenis','=',1] 
                
                ])->get();
 
          }
   
            return view('admin/jabatan/jabsekolah',[
              'layout' => $this->layout,
              'skpd'        => $skpd,
              'allpd'       =>$allpd,
              'pd'          =>$inst,
            ]);
          }
          return view('admin.login',[
            'layout' => $this->layout 
          ]);
    
    }
    //jabatan
    public function addjabatan($id)
    {
        if(Auth::guard('admin')->check()){  
          $inst = Instansi::Where('id',$id)->first();
          $jab = Jabatan::Where('id',$id)->first();
          //cek jenisjabatan e
            if($inst->id_instansi_jenis==1){
            //utama
              $alljab = Jabatan::Where(
                [
                    ['id_instansi','=',$id], 
                ])->orderBy('id')->get();

            }elseif($inst->id_instansi_jenis==2){
              //uptd
              $alljab = Jabatan::Where(
                [
                    ['id_instansi','=',$id], 
                ])->orderBy('id')->limit(1)->get();

            }elseif($inst->id_instansi_jenis==3){
              //sekolah
              $alljab = Jabatan::Where(
                [
                  ['id_instansi','=',$id],
                  ['id_jenis_jabatan','=',2]

                ])->orderBy('id_induk')->limit(1)->get();
            }else{
              //cabdin
              $alljab = Jabatan::Where(
                [
                    ['id_instansi','=',$id], 
                ])->orderBy('id')->get();

            }

            return view('admin/jabatan/addjabatan',[
            'layout' => $this->layout,
            'pd'     => $inst,
            'idna'   => $id,
            'jb'     =>$jab,
            'jabs'  =>$alljab,
             
             
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
      $id=$request->input('idna');
       
      if(!empty($request->input('id_induk'))){
        $idinduk=$request->input('id_induk');
      }else{
        $idinduk="118";
      }
        Jabatan::create([
          'id_instansi'               => $request['idinstansi'],
          'id_jenis_jabatan'          => $request['id_jenis_jabatan'],
          'nama'                      => $request['namajabatan'],
          'id_induk'                  => $idinduk,
          'id_eselon'                 => $request['id_eselon'],
          'id_tingkatan_fungsional'   => $request['id_tingkatan_fungsional'],
          'jml_bk'                    => $request['jmlbk'],
          'nilai_abk'                 => $request['nilaiabk'],
          
          ]);
       
        return Redirect::to("/admin/detailorg/".$id)->with('success','Selamat, Jabatan berhasil ditambah');
    }

    public function editjabatan($id,$menu = null, $pdna = null)
    {
        //$us = Admin::where('id', $id)->first();
        $jab = Jabatan::Where('id',$id)->first();
        $inst = Instansi::Where('id',$jab->id_instansi)->first();
        $alljab = Jabatan::Where(
            [
                ['id_instansi','=',$jab->id_instansi],
               
              ]
        )->orderBy('id')->limit(1)->get();
          return view('admin/jabatan/editjabatan',[
            'layout' => $this->layout,
            'idna'    =>$id,
            'menuna'    =>$menu,
            'jb'    =>$jab,
            'jabs'  =>$alljab,
            'pd'     =>$inst, 
            'pdna'     =>$pdna,   
             
             
        ]);

       // return view('register');
    }
    public function postEditjabatan(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
          $id=$request->input('idna');
          $menuna=$request->input('menuna');
          $pdna=$request->input('pdna');
          $idindukna=$request->input('idindukna');
          if($idindukna != "118"){
                Jabatan::where('id', $id)
                ->update([
                     
                    'id_instansi'               => $request['idinstansi'],
                    'id_jenis_jabatan'          => $request['id_jenis_jabatan'],
                    'nama'                      => $request['namajabatan'],
                    'id_induk'                  => $request['id_induk'],
                    'id_eselon'                 => $request['id_eselon'],
                    'id_tingkatan_fungsional'   => $request['id_tingkatan_fungsional'],
                    'jml_bk'                    => $request['jmlbk'],
                    'nilai_abk'                 => $request['nilaiabk'],
             
                
                ]);
          }else{
                Jabatan::where('id', $id)
                ->update([
                    
                    'id_instansi'               => $request['idinstansi'],
                    'id_jenis_jabatan'          => $request['id_jenis_jabatan'],
                    'nama'                      => $request['namajabatan'],
                    'id_eselon'                 => $request['id_eselon'],
                    'id_tingkatan_fungsional'   => $request['id_tingkatan_fungsional'],
                    'jml_bk'                    => $request['jmlbk'],
                    'nilai_abk'                 => $request['nilaiabk'],
          
                ]);
          }
          //detailorg
          if(!empty($pdna)){     
              return Redirect::to("/admin/".$menuna."/".$pdna)->with('success',' Edit Jabatan berhasil.');
          }else{
              return Redirect::to("/admin/".$menuna)->with('success',' Edit Jabatan berhasil.');
          }
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function deljabatan($id,$menu = null)
    {
        if(Auth::guard('admin')->check()){      
             
            $user = Jabatan::where('id', $id)->first();
            $user->delete();
            return Redirect::to("/admin/".$menu)->with('success',' Proses Delete berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
            ]);
        }
        
        
       
    }
    //pegawai all PD
    public function pegawai(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                // $pel2 = Usulan::Where('status_verifikasi',1)->get();
                /*
                 $response1 = Http::get('https://webapi.bps.go.id/v1/api/list/model/subject/lang/ind/domain/1906/subcat/1/key/b2da99d6cd045241b5a07b3b3009549c/');
                 $jsonDataSosial = $response1->json();
                 $catsosial = $jsonDataSosial["data"][1];
                */
              $skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
              $response = Http::get('http://satamasn.babelprov.go.id/public/api/pegawai');
              $jsonData = $response->json();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.allpegawai' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'datapeg' =>$jsonData,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    
    //Jabatan Pegawai
    public function jabpeg(Request $request)
    {
        if(Auth::guard('admin')->check()){  
            $skpd = Instansi::where('id_instansi_jenis',1)->get();

            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/jabpeg/listjabpeg' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function detailjbutama($id)
    {
        if(Auth::guard('admin')->check()){  
            $skpd = Instansi::where('id',$id)->first();
            $jab = Jabatan::Where(
                [
                    ['id_instansi','=',$id],
                    ['id_jenis_jabatan','=',1],
                    ['id_induk','=',118]
                     
                  ]
            )->orderBy('id')->get();
           

            //$skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin/jabpeg/detailjb_utama' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                    'jabs'  =>$jab,
                    
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    //addjabatanpegawai
    public function addjabpeg($id, $menu=null)
    {
        if(Auth::guard('admin')->check()){  
          $inst = Instansi::Where('id',$id)->first();
          $jab = Jabatan::Where('id',$id)->first();
           //pegawai
           $response = Http::get('http://satamasn.babelprov.go.id/public/api/pegawai');
           $jsonData = $response->json();

          //cek jenisjabatan e
            if($inst->id_instansi_jenis==1){
            //utama
              $alljab = Jabatan::Where(
                [
                    ['id_instansi','=',$id], 
                    ['id_jenis_jabatan','=',1],
                    ['id_induk','=',118]
                ])->orderBy('id')->limit(1)->get();

            }elseif($inst->id_instansi_jenis==2){
              //uptd
              $alljab = Jabatan::Where(
                [
                    ['id_instansi','=',$id], 
                ])->orderBy('id')->limit(1)->get();

            }elseif($inst->id_instansi_jenis==3){
              //sekolah
              $alljab = Jabatan::Where(
                [
                  ['id_instansi','=',$id],
                  ['id_jenis_jabatan','=',2]

                ])->orderBy('id_induk')->limit(1)->get();
            }else{
              //cabdin
              $alljab = Jabatan::Where(
                [
                    ['id_instansi','=',$id], 
                ])->orderBy('id')->get();

            }

            return view('admin/jabpeg/addjabpeg',[
            'layout' => $this->layout,
            'pd'     => $inst,
            'idpd'   => $id,
            'jb'     =>$jab,
            'jabs'  =>$alljab,
            'menu'  =>$menu,
            'datapeg' =>$jsonData,
             
             
            ]);
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }        
       // return view('register');
    }
    public function postAddjabpeg(Request $request)
    {  
      $idpd=$request->input('idpd');
      $menuna=$request->input('menuna');
      $idjab=$request->input('idjabatan');
      $nippeg=$request->input('nip');

      //pegawai
      $cekpeg = Http::get('https://satamasn.babelprov.go.id/simadig/public/api/pegawai/view/'.$nippeg);
      $detpeg = $cekpeg->json();
      $namapeg=$detpeg["nama"];

      //jabatan
      $jab = Jabatan::Where('id',$idjab)->first();
       
      $namajab=$jab->nama;
      $jenjab=$jab->id_jenis_jabatan;
      $indukinst=$jab->id_induk;


        Pegawaijabatan::create([
          'id_instansi'               => $request['idpd'],
          'id_induk'                  => $indukinst,
          'id_jenis_jabatan'          => $jenjab,
          
          'id_jabatan'                => $request['idjabatan'],
          'nama_jabatan'              => $namajab,
          'nip'                       => $request['nip'],
          'nama_pegawai'              => $namapeg,
          
          
          ]);
       
        return Redirect::to("/admin/".$menuna."/".$idpd)->with('success','Selamat, Pegawai Jabatan berhasil ditambah');
    }

    //utama
    public function iutama(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                // $pel2 = Usulan::Where('status_verifikasi',1)->get();
                $skpd = Instansi::Where('id_instansi_jenis',1)->orderBy('id')->get();
            
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.iutama' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function editskpd($id)
    {
        //$us = Admin::where('id', $id)->first();
        $skpd = Skpd::Where('id',$id)->first();
       
          return view('admin/editskpd',[
            'layout' => $this->layout,
            'pd' =>$skpd    
             
        ]);

       // return view('register');
    }
    public function postEditskpd(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $id=$request->input('idna');
                Skpd::where('id', $id)
                ->update([
                     
                    'namaskpd' => $request['namaskpd'],
                
            ]);
        
                return Redirect::to("/admin/skpd")->with('success',' Edit SKPD berhasil.');
        }else{
            return view('admin.login',[
                'layout' => $this->layout 
              ]);
        }
    }
    public function subskpd(Request $request)
    {
        if(Auth::guard('admin')->check()){  
                // $pel2 = Usulan::Where('status_verifikasi',1)->get();
                //$subskpd = Subskpd::all()->sortBy('kdsubskpd');
            $skpd = Skpd::Where('parent_skpd',1)->orderBy('kdskpd')->get();
            //return view('/pelamar/datatable', compact('pelamars'));
                return view('admin.subskpd' , [
                    'layout' => $this->layout,
                    'skpd' =>$skpd,
                     
            ]);
        }else{
                return view('admin.login',[
                    'layout' => $this->layout 
                  ]);
                }
    }
    public function editsubskpd($id)
    {
        //$us = Admin::where('id', $id)->first();
        $subskpd = Subskpd::Where('id',$id)->first();
        $kdpd = $subskpd->kdskpd;
        $skpd = Skpd::Where('kdskpd',$kdpd)->first();

          return view('admin/editsubskpd',[
            'layout' => $this->layout,
            'pd' =>$skpd,
            'sub'   =>$subskpd    
             
        ]);

       // return view('register');
    }
    public function postEditsubskpd(Request $request)
    {  
        if(Auth::guard('admin')->check()){      
                 
                $id=$request->input('idna');
                Subskpd::where('id', $id)
                ->update([
                    'kdcab' => $request['kdcab'],
                    'namasubskpd' => $request['namasubskpd'],
                
            ]);
        
                return Redirect::to("/admin/skpd")->with('success',' Edit Sub SKPD berhasil.');
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
