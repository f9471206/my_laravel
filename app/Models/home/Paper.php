<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model {
    use HasFactory;
    protected $table = 'paper';
    protected $primarkey = 'id';
    public $timestamps = false;
    protected $fillable = ['id', 'paper_name', 'start_time', 'duration'];
}
