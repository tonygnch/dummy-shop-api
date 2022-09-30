<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'forward_id',
        'name', 
        'type', 
        'stock', 
        'color', 
        'price', 
        'material', 
        'rating', 
        'sales', 
        'image', 
        'department_id'
    ];

    /**
     * Get product department
     *
     * @return BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get related products
     *
     * @return Collection
     */
    public function related()
    {
        return Product::where(function($query) {
                        $query->where('color', '=', $this->color)->orWhere('material', '=', $this->material);
                    })->whereNotIn('id', [$this->id])->get()->random(3);
    }
}
