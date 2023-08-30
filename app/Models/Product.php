<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $guarded = [];

    public function scopeStatusAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function getDataFullStringAttribute(): string
    {
        $string = "";
        foreach ($this->data as $key => $value) {
            $string .= "$key: $value";
            if ($key !== array_key_last($this->data)) $string .= '; ';
        }
        return $string;
    }

    protected $casts = [
        'data' => 'array',
    ];
}
