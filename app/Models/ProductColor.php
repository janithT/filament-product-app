<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductColor extends Model
{
    protected $fillable =
    [
        'name',
        'description',
        'hex_code'
    ];

    /**
     * Relation with type products
     *
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
