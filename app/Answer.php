<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function foo\func;

class Answer extends Model
{
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($answer){
            $answer->question->increment('answers_count');
            $answer->question->save();
        });

    }
}
