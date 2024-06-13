<?php

namespace App\Models;

use App\Data\AttributeShapes;
use App\Data\AttributeTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'shape',
    ];

    // get type by id
    public function getType($id)
    {
        $data = '';
        $types = AttributeTypes::getData();
        foreach ($types as $type) {
            if ($this->type == $type['id']) {
                $data = $type['name'];
            }
        }

        return $data;
    }

    // get shape by id
    public function getShape($id)
    {
        $data = '';
        $shapes = AttributeShapes::getData();
        foreach ($shapes as $shape) {
            if ($this->shape == $shape['id']) {
                $data = $shape['name'];
            }
        }

        return $data;
    }


    // items
    public function items()
    {
        return $this->hasMany('App\Models\AttributeItem', 'attribute_id');
    }
}
