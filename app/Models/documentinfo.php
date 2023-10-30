<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentinfo extends Model
{
    use HasFactory;
    protected $primaryKey = 'DocID';
    public $timestamps=false; //disabale the created_at & updated_at field (so we wont get error column not found)
}
