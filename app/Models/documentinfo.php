<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\docfavorite;

class documentinfo extends Model
{
    use HasFactory;
   
    

    protected $fillable = ['DocUpload',
                            'status'];

    public $incrementing = false;

    public $table = 'documentinfos';

    protected $primaryKey = 'DocID';

    protected $keyType ="integer";


    public $timestamps=false; //disabale the created_at & updated_at field (so we wont get error column not found)
    


}
