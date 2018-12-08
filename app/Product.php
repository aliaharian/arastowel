<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;

class Product extends Model
{
    use Viewable;

    public function galleries()
    {
        return $this->hasMany(gallery::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_to_categories');
    }
    public function size()
    {
        return $this->belongsToMany(size::class,'product_to_sizes');
    }
    public function color()
    {
        return $this->belongsToMany(Color::class,'product_to_colors');

    }
    public function off()
    {
        return $this->hasMany(Off::class);

    }



    public function hasCategory($id)
    {
        return in_array($id,$this->categories->pluck('id')->toArray());

    }

    public function hasColor($id)
    {
        return in_array($id,$this->color->pluck('id')->toArray());
    }
    public function hasSize($id)
    {
        return in_array($id,$this->size->pluck('id')->toArray());
    }

}
