<?php

namespace App\Models;

use App\Models\Product;
use App\Models\JenisProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisProduct extends Model
{
    use HasFactory;
    protected $table = 'jenis_products';
    protected $fillable = [
        'nama',
        'keterangan',
        'kode',
        'soft_delete'
        
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

