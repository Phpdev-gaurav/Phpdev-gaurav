<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table ='phone_numbers';

    protected $fillable =[
        'number',
        'contact_id',
        'is_landline',
        'has_whatsapp',
        'can_receive_text'
    ];
}
