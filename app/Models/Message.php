<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_type',
        'message',
        'message_count',
        'user_id',
    ];
    protected $table = 'messages';
   

}
