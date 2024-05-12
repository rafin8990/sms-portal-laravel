<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_type',
        'message',
        'message_count',
        'user_id',
        'contact',
        'user_name'
    ];
    protected $table = 'send_messages';
}
