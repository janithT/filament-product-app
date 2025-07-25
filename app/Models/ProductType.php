<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ProductType extends Model
{
    protected $fillable =
    [
        'name',
        'api_unique_number'
    ];

    /**
     * Relation with type assignments
     *
     */
    public function typeAssignments() : HasMany
    {
        return $this->hasMany(TypeAssignment::class, 'type_id');
    }

    /**
     * Relation with product Categories
     *
     */
    public function productCategories(): MorphToMany
    {
        return $this->morphedByMany(
            ProductCategory::class,
            'type_assignments',      
            'type_assignments',       
            'type_id',                
            'type_assignments_id'     
        )
        ->withPivot('my_bonus_field')
        ->withTimestamps();
    }

}
