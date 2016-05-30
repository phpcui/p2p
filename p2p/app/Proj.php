<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proj extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'pid';
    public $timestamps = false;
}
