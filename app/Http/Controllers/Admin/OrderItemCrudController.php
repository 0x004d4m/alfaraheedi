<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class OrderItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Orders'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Orders'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\OrderItem');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order-item');
        $this->crud->setEntityNameStrings('order item', 'order items');
    }

    protected function setupListOperation()
    {

        $this->crud->addColumn([
            'name' => 'quantity',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'price',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'tax',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'label' => "Product",
            'type' => "select",
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Product'
        ]);

        $this->crud->addColumn([
            'label' => "Customer",
            'type' => "select",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "full_name",
            'model' => 'App\Models\Customer'
        ]);

        $this->crud->addColumn([
            'label' => "Order ID",
            'type' => "select",
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => "id",
            'model' => 'App\Models\Order'
        ]);
    }
}
