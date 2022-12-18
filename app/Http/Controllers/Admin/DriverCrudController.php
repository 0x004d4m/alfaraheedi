<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DriverRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class DriverCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Drivers'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Drivers'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Driver');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/driver');
        $this->crud->setEntityNameStrings('driver', 'drivers');
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
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'car_model',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'car_plate',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'car_color',
            'type' => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DriverRequest::class);

        $this->crud->addField([
            'name' => 'first_name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'last_name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'car_model',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'car_plate',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'car_color',
            'type' => 'text',
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
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'car_model',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'car_plate',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'car_color',
            'type' => 'text',
        ]);
    }
}
