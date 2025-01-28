<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    //use HasFactory;

    protected $table = "beneficiarios";
    protected $primaryKey = "idBenef";
    protected $fillable = ['Apellidos_Nombres','CedulaB','FecNacB','SexoB','EdoCivilB','Parentesco','Cedula_A'];
    protected $guarded = "idBenef";

    public $timestamps = false;
}
