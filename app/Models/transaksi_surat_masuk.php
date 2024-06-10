<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_surat_masuk extends Model
{
    use HasFactory;
    protected $fillable = ['asal_surat', 'nomor_surat', 'tanggal_surat', 'tanggal_diterima', 'perihal'];
}
