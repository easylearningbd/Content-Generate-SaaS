<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatConversation extends Model
{
    protected $guarded = [];

    public function assistant(){
        return $this->belongsTo(ChatAssistant::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function conversation(){
        return $this->belongsTo(ChatConversation::class, 'conversation_id');
    }

}
