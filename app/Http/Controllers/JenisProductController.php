<?php

namespace App\Http\Controllers;

use App\Models\JenisProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisProductController extends Controller
{
    public function index(){
        $jenis_product = JenisProduct::where('soft_delete',0)->get();
        return view('data-master.jenis-product.index',compact('jenis_product'));
    }
    public function data(Request $request)
    {
        DB::transaction(function () use($request) {
            $maxkode = JenisProduct::max('kode');

            if (!$maxkode) {
                $numberup = 1;
            } else {
                $numberdown = intval(substr($maxkode,2));
                $numberup = $numberdown + 1;
            }

            $cetakkode = 'JR' . str_pad($numberup, 3, '0', STR_PAD_LEFT);

        
        $tambah_product = new JenisProduct(); 

        $tambah_product->nama = $request->nama;
        $tambah_product->keterangan = $request->keterangan;
        $tambah_product->kode = $cetakkode;
        // dd($request->all());  
        $tambah_product->save();
        
    });
        return redirect('/data-master/jenis-product')->with('sukses','Data Berhasil Ditambahkan !!!');
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $jenis_update = JenisProduct::findOrFail($id);
        // dd($jenis_update);
        $data = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ];
        if(!empty($request->kode)){
            $data["kode"] = $request->kode;
        }
        // dd($data);
        $jenis_update->update($data);

        return redirect('/data-master/jenis-product')->with('sukses','Data Berhasil Di Edit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_hapus = JenisProduct::findOrFail($id);
        
        $jenis_hapus->update(['soft_delete'=>1]);
        // dd($jenis_update);
        return redirect('/data-master/jenis-product')->with('sukses','Data Berhasil Di Hapus');
    }
}
