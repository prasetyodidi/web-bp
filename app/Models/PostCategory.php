<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostCategory extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $primaryKey = null;
    protected $fillable = [
        'post_id',
        'category_id'
    ];
    protected $table = 'post_category';

    protected $guarded = [];
}
