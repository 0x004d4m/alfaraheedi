<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PublisherRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PublisherCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Publishers'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Publishers'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Publisher');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/publisher');
        $this->crud->setEntityNameStrings('publisher', 'publishers');
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
        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'updated_at',
            'type' => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PublisherRequest::class);

        $this->crud->addField([
            'name' => 'name_ar',
            'type' => 'text',
            'label' => 'Name AR',
        ]);

        $this->crud->addField([
            'name' => 'name_en',
            'type' => 'text',
            'label' => 'Name EN',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
