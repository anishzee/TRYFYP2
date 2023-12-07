<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docfavorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'doc_id'];

    public function document()
    {
        return $this->belongsTo(documentinfo::class, 'doc_id', 'DocID');
    }
}
