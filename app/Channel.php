<?php

namespace MovieApp;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Channel extends Model implements HasMedia
{
    use HasMediaTrait;

    public function user(){
        return $this->belongsTo(User::class);
    }
    

    public function editable() {
        if(!auth()->check()) return false;
        return $this->user_id === auth()->user()->id;
    }

    public function subscriptions() {
        return $this->hasMany(Subscription::class);
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }
}
