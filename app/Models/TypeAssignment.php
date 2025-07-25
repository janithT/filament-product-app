<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TypeAssignment extends Model
{
    protected $fillable =
    [
        'type_assignments_type',
        'type_assignments_id',
        'my_bonus_field',
        'type_id'
    ];

    /**
     * Relation with type assignments
     *
     */
    public function typeAssignments() : MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Relation with product type
     *
     */
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }
}
