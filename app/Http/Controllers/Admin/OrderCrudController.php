<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

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
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/orders');
        $this->crud->setEntityNameStrings('order', 'orders');
    }

    protected function setupListOperation()
    {

        $this->crud->addColumn([
            'name' => 'id',
            'type' => 'text',
            'label' => 'ID',
        ]);

        $this->crud->addColumn([
            'label' => "Order Status",
            'type' => "select",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus'
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
            'label' => "Driver",
            'type' => "select",
            'name' => 'driver_id',
            'entity' => 'driver',
            'attribute' => "full_name",
            'model' => 'App\Models\Driver'
        ]);

        $this->crud->addColumn([
            'name' => 'delivery_price',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'total',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'text',
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
            'type' => 'text',
            'label' => 'ID',
        ]);

        $this->crud->addColumn([
            'name' => 'delivery_price',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'total',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'label' => "Order Status",
            'type' => "select",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus'
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
            'label' => "Driver",
            'type' => "select",
            'name' => 'driver_id',
            'entity' => 'driver',
            'attribute' => "full_name",
            'model' => 'App\Models\Driver'
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'text',
        ]);

        Widget::add([
            'type'               => 'relation_table',
            'name'               => 'orderItems',
            'label'              => 'Order Items',
            'button_create'      => false,
            'buttons'      => false,
            'relation_attribute' => 'order_id',
            'backpack_crud'  => 'order-item','columns' => [
                [
                    'label' => 'Product',
                    'name'  => 'product.name_'.app()->getLocale(),
                ],
                [
                    'label' => 'Quantity',
                    'name'  => 'quantity',
                ],
                [
                    'label' => 'Price',
                    'name'  => 'price',
                ],
                [
                    'label' => 'Tax',
                    'name'  => 'tax',
                ],
            ],
        ])->to('after_content');
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        $this->crud->addField([
            'label' => "Driver",
            'type' => "relationship",
            'name' => 'driver_id',
            'entity' => 'driver',
            'attribute' => "full_name",
            'model' => 'App\Models\Driver',
        ]);

        $this->crud->addField([
            'label' => "Order Status",
            'type' => "relationship",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\OrderStatus',
        ]);
    }
}
