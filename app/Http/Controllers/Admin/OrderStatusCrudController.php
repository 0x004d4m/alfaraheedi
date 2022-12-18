<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderStatusRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class OrderStatusCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Order Status'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Order Status'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\OrderStatus');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order-status');
        $this->crud->setEntityNameStrings('order status', 'order statuses');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name_ar',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'name_en',
            'type' => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(OrderStatusRequest::class);

        $this->crud->addField([
            'name' => 'name_ar',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'name_en',
            'type' => 'text',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
