<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    

    protected $table ='text_message';

    protected $fillable =[
        'phone_number__id',
        'body',
        'is_incoming'
    ];
}
