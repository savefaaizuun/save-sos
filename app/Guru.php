<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'tbl_guru';

    public static function scopeTest(){
    echo "This is a test function";
   }
}