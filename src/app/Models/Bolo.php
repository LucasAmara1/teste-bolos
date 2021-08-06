<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolo extends Model
{
    use HasFactory;

    protected $table = 'bolos';

    protected $fillable = [
        'nome',
        'peso',
        'valor',
        'quantidade',
        'notificar'
    ];

    public function email()
    {
        return $this->hasMany(Email::class, 'id', 'id_bolo');
    }
}
