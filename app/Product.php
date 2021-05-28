<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $price
 * @property integer $discount
 * @property integer $old_price
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'status', 'description', 'price', 'discount', 'old_price', 'image', 'created_at', 'updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
