<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'cooperation';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'cooperation_code',
        'cooperation_name',
        'cooperation_email',
        'cooperation_no_telp',
        'cooperation_company',
        'cooperation_email_company',
        'cooperation_location',
        'cooperation_address_one',
        'cooperation_address_two',
        'cooperation_city',
        'cooperation_country',
        'cooperation_state',
        'cooperation_zip_code',
        'status',
    ];
}
