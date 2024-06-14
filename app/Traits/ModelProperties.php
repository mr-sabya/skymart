<?php

namespace App\Traits;

use Illuminate\Support\Str;
use ReflectionClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

trait ModelProperties
{
    public function getModelPropertiesWithDatatype()
    {
        // Get table name
        $table = $this->getTable();

        // Get columns from the table
        $columns = Schema::getColumnListing($table);

        // Get column types from the database schema
        $columnTypes = [];
        foreach ($columns as $column) {
            $type = Schema::getColumnType($table, $column);
            $columnTypes[$column] = $type;
        }

        // Get attributes from the model
        $modelAttributes = (new ReflectionClass($this))->getDefaultProperties();

        // Merge database columns and model attributes
        $properties = [];
        foreach ($columnTypes as $column => $type) {
            $properties[$column] = [
                'type' => $type,
                'default' => $modelAttributes[$column] ?? null
            ];
        }

        return $properties;
    }
}
