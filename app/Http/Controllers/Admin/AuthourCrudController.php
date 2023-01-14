<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AuthourRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class AuthourCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Authours'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Authours'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Authour');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/authour');
        $this->crud->setEntityNameStrings('authour', 'authours');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'name_ar',
            'type' => 'text',
            'label' => 'Name AR',
        ]);

        $this->crud->addColumn([
            'name' => 'name_en',
            'type' => 'text',
            'label' => 'Name EN',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AuthourRequest::class);

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
