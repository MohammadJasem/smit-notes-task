<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id', 'title', 'note', 'language', 'visible_mode', 'slug'
    ];

    public function comments(){
        return $this->hasMany('App\Comment', 'note_id', 'id');
    }

    public function getShortNote(){
        $note = $this->note;
        if (strlen($note) > 200){
            $stringCut = substr($note, 0, 200);
            $endPoint = strrpos($stringCut, ' ');
            $note_less = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $note_less .= ' ...';
        } else {
            $note_less = $note;
        }

        return $note_less;
    }
}
