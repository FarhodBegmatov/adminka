<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */

class Category extends Model
{
    protected $fillable = ['name', 'parent_id', 'status', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->hasMany(Product::class, 'parent_id', 'id');
    }
}
