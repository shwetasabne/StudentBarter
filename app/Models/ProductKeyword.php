<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductKeyword extends Model
{
    protected $table = 'products_keywords';
    protected $fillable = ['product_id','keyword_id'];
}
