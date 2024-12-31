<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekruit extends Model
{
    use HasFactory;

    protected $table = 'rekruits';

    protected $fillable = [
        'nama',
        'nim',
        'kelas',
        'semester',
        'angkatan',
        'no_telepon',
        'email',
        'tentor_matkul',
        'nilai_matkul',
        'IPK',
        'pengalaman_tentor',
        'alasan',
        'program',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
