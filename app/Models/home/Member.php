<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    use HasFactory;
    protected $table = 'member';
    protected $primarkey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'age', 'email', 'avatar'];
}
