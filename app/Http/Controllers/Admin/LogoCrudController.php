<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LogoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LogoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Logo'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Logo'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel(\App\Models\Logo::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/logo');
        $this->crud->setEntityNameStrings('logo', 'logos');
    }

    protected function setupListOperation()
    {
        $this->crud->column('name');
        $this->crud->column('image')->type('image');
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(LogoRequest::class);

        $this->crud->field('name')->attributes([
            'readonly'=>true
        ]);
        $this->crud->field('image')->type('image');
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
