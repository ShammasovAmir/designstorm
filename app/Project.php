<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title'];

    public function inspirations() {
        return $this->hasMany('App\Inspiration');
    }

    public function deleteRelated() {
        $this->inspirations()->delete();

        return parent::delete();
    }
}
