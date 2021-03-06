<?php

namespace App\Shop\Orders;

use App\Shop\Addresses\Address;
use App\Shop\Couriers\Courier;
use App\Shop\Customers\Customer;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class OrderProduct extends Model
{

    protected $table = 'order_product';
    public $timestamps = false;
    /**
     * Searchable rules.
     *
     * Columns and their priority in search results.
     * Columns with higher values are more important.
     * Columns with equal values have equal importance.
     *
     * @var array
     */
    // protected $searchable = [
    //     'columns' => [
    //         'customers.name' => 10,
    //         'orders.reference' => 8,
    //         'products.name' => 5
    //     ],
    //     'joins' => [
    //         'customers' => ['customers.id', 'orders.customer_id'],
    //         'order_product' => ['orders.id', 'order_product.order_id'],
    //         'products' => ['products.id', 'order_product.product_id'],
    //     ],
    //     'groupBy' => ['orders.id']
    // ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'product_attribute_id',
        'quantity',
        'product_name',
        'product_sku',
        'product_description',
        'product_price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
