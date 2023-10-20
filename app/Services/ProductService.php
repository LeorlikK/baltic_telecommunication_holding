<?php

namespace App\Services;

class ProductService
{
    public function deleteNullValueAttributes(array $attributesName, array $attributesValue): ?array
    {
        $attributes = [];
        if ($attributesName && $attributesValue){
            foreach (array_combine($attributesName, $attributesValue) as $key => $value) {
                if ($key) $attributes[$key] = $value;
            }
        }
        return empty($attributes) ? null : $attributes;
    }
}
