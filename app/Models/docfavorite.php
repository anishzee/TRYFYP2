<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docfavorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'doc_id'];
    
    public $table = 'docfavorites';

    protected $primaryKey = 'FavID';

    protected $keyType ="integer";
    
    public $timestamps=false; //disabale the created_at & updated_at field (so we wont get error column not found)
    
}
