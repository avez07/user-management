<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_age_catigeries extends Model
{
    use HasFactory;
    protected $table = 'user_age_categories';
    protected $primaryKey ='id';
}
