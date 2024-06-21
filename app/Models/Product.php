<?php

namespace App\Models;

use App\Traits\ModelProperties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, ModelProperties;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'brand_id',
        'name',
        'slug',
        'sku',
        'mfg_date',
        'exp_date',
        'stock',
        'price',
        'actual_price',
        'off',
        'short_description',
        'description',
        'image'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function infos()
    {
        return $this->hasMany(ProductInfo::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');   
    }

    public function variants()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');   
    }

    public function checkCategory($id)
    {
        $category = $this->categories()->where('category_id', $id)->first();
        if($category){
            return true;
        }
        return false;
    }

    public function checkAttribute($id = NULL)
    {
        $attribute = $this->attributes()->where('attribute_id', $id)->first();
        if($attribute){
            return true;
        }
        return false;
    }


}
