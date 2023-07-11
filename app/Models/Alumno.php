<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Alumno extends Model
{
    use HasFactory;
    protected $alumnos ='alumnos';
    protected $primaryKet = 'id';
    protected $fillable = ['dni','name','email','direccion'];

}
