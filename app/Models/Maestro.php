<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Maestro extends Model
{
    use HasFactory;
    protected $maestros ='maestros';
    protected $primaryKet = 'id';
    protected $fillable = ['dni','name','email','direccion'];

}
