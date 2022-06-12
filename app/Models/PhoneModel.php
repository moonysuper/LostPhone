<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    use HasFactory;
    protected $table = 'phones';
    protected $fillable = [
        'ownerid',
        'ownername',
        'phone',
        'Imei',	
        'brand',
        'model',
        'ptheft',
        'date',
        'confirm',
        'rep_image',	
        'box_image'
    ];
}
