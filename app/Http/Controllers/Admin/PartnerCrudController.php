<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PartnerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PartnerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Partners'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Partners'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Partner');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/partner');
        $this->crud->setEntityNameStrings('partner', 'partners');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PartnerRequest::class);

        $this->crud->addField([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
