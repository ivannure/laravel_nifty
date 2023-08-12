<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\JenisProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{
    public function index(){
        $product = DB::table('products as p')
                ->join('jenis_products as jp', 'p.jenis_product_id', '=', 'jp.id')
                ->join('users as us', 'p.user_id', '=', 'us.id')
                ->select('p.*', 'jp.nama as jenis_nama', 'us.username as user_nama')
                ->where('p.soft_delete',0)
                // ->orderBy('products.kode', 'asc')
                ->get();
        // return DataTables::of($product)->make(true);
        // dd($product);
        // $product = Product::where('soft_delete',0)->orderBy('kode', 'asc')->paginate(10);
        return view('data-master.product.index',compact('product'));
    }
    public function data()
    {
        $users = User::all();
        $jenisProducts = JenisProduct::all();

        return response()->json([
            'users' => $users,
            'jenisProducts' => $jenisProducts
        ]);
    }
    public function tambah(Request $request)
    {
        DB::transaction(function () use($request) {
                $maxkode = Product::max('kode');
                if (!$maxkode) {
                    $numberup = 1;
                } else {
                    $numberdown = intval(substr($maxkode,2));
                    $numberup = $numberdown + 1;
                }
                $cetakkode = 'PR' . str_pad($numberup, 3, '0', STR_PAD_LEFT);
    
            $tambah_product = new Product();
    
            $tambah_product->nama = $request->nama;
            $tambah_product->deskripsi = $request->deskripsi;
            $tambah_product->harga = $request->harga;
            $tambah_product->jenis_product_id = $request->jenis_product_id;
            $tambah_product->user_id = $request->user_id;
            $tambah_product->kode = $cetakkode;
            $tambah_product->save();
            
        });
            return redirect('/data-master/product')->with('sukses','Data Berhasil Ditambahkan !!!');
        
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $product_update = Product::findOrFail($id);
        // dd($product_update);
        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ];
        if(!empty($request->user_id)){
            $data["user_id"] = $request->user_id;
        }
        if(!empty($request->jenis_product_id)){
            $data["jenis_product_id"] = $request->jenis_product_id;
        }
        // dd($data);
        $product_update->update($data);

        return redirect('/data-master/product')->with('sukses','Data Berhasil Di Edit');
    }
    public function destroy($id)
    {
        $product_hapus = Product::findOrFail($id);
        
        $product_hapus->update(['soft_delete'=>1]);
        // dd($jenis_update);
        return redirect('/data-master/product')->with('sukses','Data Berhasil Di Hapus');
    }
}
