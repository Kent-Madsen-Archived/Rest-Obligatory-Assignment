<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountMailsModel extends Model
{
    use HasFactory;

    protected $table = 'account_mail';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = 
    [
        'mail_content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = 
    [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = 
    [
        
    ];
}
