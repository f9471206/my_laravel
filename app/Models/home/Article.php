<?php

namespace App\Models\Home;

use App\Models\home\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    use HasFactory;
    //定義關聯的數據表
    protected $table = 'article';
    //禁用時間字段
    public $timetamps = false;

    //模型的關聯操作，關聯作者模型(一對一)
    public function author() {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }

    //一對多的模型關聯
    public function comment() {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }
}
