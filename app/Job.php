<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'id','user_id','title','description','salary','location','apply'
    ];
}
