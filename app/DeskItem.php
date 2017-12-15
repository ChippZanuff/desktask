<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DeskItem extends Model
{
    protected $fillable = ['id', 'user_id', 'title', 'description', 'image_path', 'queue_order'];
}
