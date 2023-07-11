<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Clase extends Model
{
    use HasFactory;
    protected $clases ='clases';
    protected $primaryKet = 'id';
    protected $fillable = ['name','maestro_id'];

}