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
        return $this->belongsToMany('App\Models\Category');
    }

    public function checkCategory($id)
    {
        $category = $this->categories()->where('id', $id)->first();
        if($category){
            return true;
        }
        return false;
    }


}
