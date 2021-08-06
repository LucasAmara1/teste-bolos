<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'emails';

    protected $fillable = [
        'endereco_email',
        'id_bolo',
    ];

    public function bolo()
    {
        return $this->belongsTo(Bolo::class, 'id_bolo', 'id');
    }
}
