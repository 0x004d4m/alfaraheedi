<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DiscountRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class DiscountCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Discounts'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Discounts'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Discount');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/discount');
        $this->crud->setEntityNameStrings('discount', 'discounts');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'code',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'discount_value',
            'type' => 'text',
            'suffix' => '%',
        ]);

        $this->crud->addColumn([
            'name' => 'active',
            'type' => 'boolean',
        ]);

        $this->crud->addColumn([
            'label' => "Category",
            'type' => "select",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Category'
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'boolean',
        ]);

        $this->crud->addColumn([
            'name' => 'updated_at',
            'type' => 'boolean',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DiscountRequest::class);

        $this->crud->addField([
            'name' => 'code',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'discount_value',
            'type' => 'text',
            'suffix' => '%',
        ]);

        $this->crud->addField([
            'name' => 'active',
            'type' => 'boolean',
        ]);

        $this->crud->addField([
            'label' => "Category",
            'type' => "relationship",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "name_".app()->getLocale(),
            'model' => 'App\Models\Category'
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
