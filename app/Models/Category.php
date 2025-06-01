<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi ke Report (1 kategori bisa punya banyak laporan)
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
