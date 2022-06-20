<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class arrays extends Model
{
    protected $table = 'arrays';
    protected $primaryKey = 'id';
    protected $name = 'name';
    protected $array = 'array';
    public $timestamps = false;
}
