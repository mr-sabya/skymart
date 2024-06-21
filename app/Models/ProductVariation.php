<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'attribute_id',
        'attribute_item_id',
        'sku',
        'stock',
        'weight',
        'length',
        'width',
        'height',
        'price',
        'actual_price',
    ];


    public function attributeItem()
    {
        return $this->belongsTo(AttributeItem::class, 'attribute_item_id');
    }
}
