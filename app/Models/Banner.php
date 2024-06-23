<?php

namespace App\Models;

use App\Data\BannerTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'button_text',
        'link',
        'image',
        'type',
        'is_active',
    ];


    // get type by id
    public function getType($id)
    {
        $data = '';
        $types = BannerTypes::getData();
        foreach ($types as $type) {
            if ($this->type == $type['id']) {
                $data = $type['name'];
            }
        }

        return $data;
    }
}
