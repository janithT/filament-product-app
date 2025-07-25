<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable =
    [
        'name',
        'product_category_id',
        'product_color_id',
        'description'
    ];

    /**
     * Relation with product category.
     *
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * Relation with product color.
     *
     */
    public function color() : BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

    /**
     * Relation with type assignments.
     *
     */
    public function typeAssignments() : MorphMany
    {
        return $this->morphMany(TypeAssignment::class, 'type_assignments');
    }

    /**
     * Relation with product category -> product type.
     *
     */
    public function productTypes() :MorphToMany
    {
        return $this->category?->productTypes();

    }
}
