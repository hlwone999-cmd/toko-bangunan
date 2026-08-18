<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $slug
 * @property string $sku
 * @property string $description
 * @property string $category
 * @property string $brand
 * @property int $price
 * @property string $price_display
 * @property string $unit
 * @property string $stock_status
 * @property string $image_url
 * @property string $images
 * @property array $specifications
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'category',
        'brand',
        'price',
        'price_display',
        'unit',
        'stock_status',
        'image_url',
        'images',
        'specifications',
    ];

    protected $casts = [
        'price' => 'integer',
        'images' => 'array',
        'specifications' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
