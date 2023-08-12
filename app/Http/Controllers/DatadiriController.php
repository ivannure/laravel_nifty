<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DatadiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabeluser = User::where('soft_delete',0)->get();
        // dd($tabeluser);
        return view('data-diri.index', compact('tabeluser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $user = new User(); // Membuat instance baru dari model User

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('/data-diri/')->with('sukses','Data User Berhasil Ditambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function simpan($id)
    {
        $user_edit = User::findOrFail($id);
        return view('/data-diri/edit',compact('user_edit')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user_update = User::findOrFail($id);
        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];
        if(!empty($request->password)){
            $data["password"] = $request->password;
        }
        // dd($data);
        $user_update->update($data);

        return redirect('/data-diri/')->with('sukses','Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_update = User::findOrFail($id);
        
        $user_update->update(['soft_delete'=>1]);
        // dd($user_update);
        return redirect('/data-diri/')->with('sukses','Data Berhasil Di Hapus');
    }
}
