<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "t_categories";
    protected $primaryKey = "id";
    //tipe data primary
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = false;
}
