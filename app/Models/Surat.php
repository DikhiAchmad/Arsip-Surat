<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = "surat";

    protected $fillable = ['nomor_surat', 'kategori', 'judul', 'file_surat'];
}