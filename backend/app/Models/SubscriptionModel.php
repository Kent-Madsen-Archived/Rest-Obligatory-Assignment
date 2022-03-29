<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * 
 */
class SubscriptionModel 
    extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    /**
     * 
     */
    protected $fillable = 
    [
        'category_id',
        'mail_id'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = 
    [
        'created_at', 
        'updated_at'
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = 
    [
          
    ];

}
