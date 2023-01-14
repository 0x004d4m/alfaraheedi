<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        if (!backpack_user()->can('Manage Settings'))
        {
            abort(403, 'Access denied');
        }
        $this->crud->setModel('App\Models\Setting');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/setting');
        $this->crud->setEntityNameStrings('setting', 'settings');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'delivery_price',
            'type' => 'text',
        ]);
        $this->crud->addColumn([
            'name' => 'updated_at',
            'type' => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SettingRequest::class);

        $this->crud->addField([
            'name' => 'delivery_price',
            'type' => 'text',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
