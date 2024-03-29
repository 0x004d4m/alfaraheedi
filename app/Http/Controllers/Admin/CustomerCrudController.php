<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CustomerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Customers'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Customers'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\CustomerBackPack');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/customer');
        $this->crud->setEntityNameStrings('customer', 'customers');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'first_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'last_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CustomerRequest::class);

        $this->crud->addField([
            'name' => 'first_name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'last_name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'email',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'address',
            'type' => 'textarea',
        ]);

        if(request()->route('id')==null){
            $this->crud->addField([
                'name' => 'password',
                'type' => 'password',
            ]);
        }

        $this->crud->addField([
            'name' => 'image',
            'type' => 'image',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'first_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'last_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
        ]);
    }
}
