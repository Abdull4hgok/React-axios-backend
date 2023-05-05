<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restapibackend extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $guarded = ['id'];
}
