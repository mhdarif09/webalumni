<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';

    protected $fillable = [
        'user_id',
        'jenjang',
        'institusi',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
        'ipk',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
