<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docrequest extends Model
{
    use HasFactory;

    protected $fillable = ['ReqUserID', 'ReqDocID'];
    
    public $table = 'docrequests';

    protected $primaryKey = 'ReqID';

    protected $keyType ="integer";
    
    public $timestamps=false; //disabale the created_at & updated_at field (so we wont get error column not found)
}
