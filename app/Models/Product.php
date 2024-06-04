<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "tabel_barang";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kd_kategori', 'kode');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'kd_satuan', 'kode');
    }
}
