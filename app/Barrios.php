<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrios extends Model
{
    protected $table='barrios';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
        'id',
        'nombre'
    ];

    protected $guarded =[

    ];
}
