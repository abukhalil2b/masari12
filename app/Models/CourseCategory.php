<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $guarded = [];
    
    public function children()
    {
        return $this->hasMany(CourseCategory::class, 'parent_id');
    }
}
