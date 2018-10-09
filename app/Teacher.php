<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Teacher extends Model
{
    //
    protected $guarded = [];
    public function subjectss(){
        return $this->hasMany(Subject::class);
    }
}
