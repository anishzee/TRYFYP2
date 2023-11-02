<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentinfo extends Model
{
    use HasFactory;
    protected $primaryKey = 'DocID';
    public $timestamps=false; //disabale the created_at & updated_at field (so we wont get error column not found)

    protected $fillable = ['DocUpload'];

    // Mutator for storing the uploaded file path
    public function setDocUploadAttribute($value)
    {
        $path = 'C:\Users\MASTER ZACK\OneDrive - Universiti Tenaga Nasional\Anish\'s Studies\A - SEM 1 23_24\ALL ABOUT FYP\Documentinfos-laraveldatastore';
        $this->attributes['DocUpload'] = $path . '/' . $value;
    }
}
