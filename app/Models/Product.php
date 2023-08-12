<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\JenisProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'jenis_product_id',
        'user_id',
        'kode',
        'soft_delete'
    ];
    public function jenisproduct()
    {
        return $this->belongsTo(JenisProduct::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
