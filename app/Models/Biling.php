<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biling extends Model
{
    use HasFactory;
    protected $table ="bilings";
    protected $primaryKey = 'id';

    public $timestamps = false;

}
