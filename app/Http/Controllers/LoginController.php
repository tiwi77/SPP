<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login', [
            'title' => 'Login || Page'
        ]);
    }

    public function actionlogin(Request $request){
        $data = [
            'username'      => $request->input('username'),
            'password'      => $request->input('password')
        ];

        if(Auth::attempt($data)){
            return redirect('/dada');
        } else {
            $request->session()->flash('error', 'Username atau Password salah!');
            return redirect('login');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

    public function loginsiswa(){
        return view('auth.loginsiswa',[
            'title' => 'Login - Siswa || Page'
        ]);
    }

    public function actionsiswa(Request $request)
    {
        $data = Siswa::where('nisn', $request->nisn)->exists();

        if($data) :
              $siswa = Siswa::where('nisn', $request->nisn)->get();

              foreach($siswa as $val) :
                  Session::put('id', $val->id);
                  $nis = $val->nis;
              endforeach;

              if(strtolower($nis) == strtolower($request->nis)) :

                    Session::put('nisn', $request->nisn);
                    Session::put('nis', $request->$nis);


                    return redirect('/dashboard');

                    return back()->with('gagal login', 'NISN dan NIS siswa tidak sesuai' );
              endif;
              return back()->with('gagal login', 'Data siswa dengan NISN ini tidak ditemukan');
              endif;
    }
}
