<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $append = ['format_tgl_lahir'];

    public function getFormatTglLahirAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['tgl_lahir'])->isoFormat('D MMMM Y');
    }
}
