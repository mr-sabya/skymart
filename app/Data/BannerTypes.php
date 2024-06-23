<?php

namespace App\Data;

class BannerTypes
{
    public static function getData()
    {
        return   [
            [
                'id' => 1,
                'name' => 'Hero Banner'
            ],
            [
                'id' => 2,
                'name' => 'Regular Banner'
            ],
            [
                'id' => 3,
                'name' => 'Long Banner'
            ],
        ];
    }
}
