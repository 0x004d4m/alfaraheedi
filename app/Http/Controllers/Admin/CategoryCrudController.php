<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Categories'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Categories'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');
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

        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);

        $this->crud->addColumn([
            'name' => 'type',
            'type' => 'text',
            'label' => 'Type',
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'text',
            'label' => 'Created At',
        ]);

        $this->crud->addColumn([
            'name' => 'updated_at',
            'type' => 'text',
            'label' => 'Updated At',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryRequest::class);

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

        $this->crud->addField([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);

        $this->crud->addField([
            'name'        => 'type',
            'label'       => "Type",
            'type'        => 'select_from_array',
            'options'     => ['book' => 'book', 'misc' => 'misc'],
            'allows_null' => false,
            'default'     => 'book',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
