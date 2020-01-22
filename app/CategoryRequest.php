<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryRequest extends Model
{

    use SoftDeletes;

    protected $table = 'CategoryRequests';

    protected $guarded = [
        'id'
    ];

}
