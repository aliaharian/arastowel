<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;

class blog extends Model
{
    use Viewable;


    public function tags()
    {
        return $this->belongsToMany(Tag::class,'blog_to_tags');
    }

    public function hasTag($id)
    {
        return in_array($id,$this->tags->pluck('id')->toArray());
    }
}
