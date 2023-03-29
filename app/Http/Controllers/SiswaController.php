<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if((Auth()->user()->level == "Admin") || (Auth()->user()->level == "Petugas"))
        {
            return view('admin.data_siswa.index', [
                'title' => 'Main Page admin/petugas',
                'siswa' => Siswa::all()
            ]);
        }else{
            return view('admin.data_siswa.index',[
                'title'  => 'Main Page',
                'siswa'  => Siswa::where('nisn', Auth()->user()->nisn)->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'     => 'View Data'
        ];
        return view('admin.data_siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn'      => 'required|max:10|numeric',
            'nis'       => 'required|max:8|numeric',
            'nama'      => 'required|max:250',
            'id_kelas'  => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required|min:11|max:13',
            'id_spp'    => 'required'
        ]);

        if($this) :
            $siswa = Siswa::create([
                'nisn'      => $request->nisn,
                'nis'       => $request->nis,
                'nama'      => $request->nama,
                'id_kelas'  => $request->id_kelas,
                'alamat'    => $request->alamat,
                'no_telp'   => $request->no_telp,
                'id_spp'    => $request->id_spp
            ]);


            if ($siswa) {
                return redirect('siswa.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
            } else {
                return back()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
            }
        endif;
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nisn)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nisn)
    {
        $siswa = Siswa::findOrFail($nisn);
        $title = 'Edit Data';
        return view('admin.data_siswa.edit', compact('siswa','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {
        $this->validate($request, [
            'nisn'      => 'required|max:10',
            'nis'       => 'required|max:8',
            'nama'      => 'required|max:250',
            'id_kelas'  => 'required',
            'alamat'    => 'required',
            'no_telp'   => 'required|min:11|max:13',
            'id_spp'    => 'required'
        ]);

        $siswa = Siswa::findOrFail($nisn);

        $siswa->update([
            'nisn'      => $request->nisn,
            'nis'       => $request->nis,
            'nama'      => $request->nama,
            'id_kelas'  => $request->id_kelas,
            'alamat'    => $request->alamat,
            'no_telp'   => $request->no_telp,
            'id_spp'    => $request->id_spp
        ]);

        if ($siswa) {
            return redirect('siswa.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        $siswa = Siswa::findOrFail($nisn);
        $siswa->delete();

        if ($siswa) {
            return redirect()
                ->route('siswa.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
}
