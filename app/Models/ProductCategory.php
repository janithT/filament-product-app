<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ProductCategory extends Model
{
    protected $fillable =
    [
        'name',
        'description',
        'external_url'
    ];

    /**
     * Relation with products.
     *
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Relation with type product types. this is interesting :)
     *
     */
    public function productTypes(): MorphToMany
    {
        return $this->morphToMany(
            ProductType::class,
            'type_assignments',      
            'type_assignments',       
            'type_assignments_id',    
            'type_id' ,              
        )
            ->where('type_assignments_type', self::class)
            ->withPivot('my_bonus_field')
            ->withTimestamps();
    }
}
