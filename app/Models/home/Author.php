<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model {
    use HasFactory;
    //定義關聯的數據表
    protected $table = 'author';
    //禁用時間字段
    public $timetamps = false;
}
