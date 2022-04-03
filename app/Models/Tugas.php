<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'table_kasus';

    protected $fillable = ['nis', 'nama_mapel', 'nama_tugas', 'deskripsi_tugas', 'deadline', 'status_pengerjaan', 'skor'];
}
