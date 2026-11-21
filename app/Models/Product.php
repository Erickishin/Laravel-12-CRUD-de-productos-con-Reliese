<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $product_id
 * @property int $category_id
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property int $stock
 * 
 * @property Category $category
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'product_id';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'price' => 'float',
		'stock' => 'int'
	];

	protected $fillable = [
		'category_id',
		'name',
		'description',
		'price',
		'stock'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
