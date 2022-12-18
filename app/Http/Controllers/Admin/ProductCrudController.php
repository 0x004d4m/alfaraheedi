<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Products'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Products'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
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
            'name' => 'image1',
            'type' => 'image',
            'label' => 'Image 1',
        ]);

        $this->crud->addColumn([
            'name' => 'price',
            'type' => 'text',
            'label' => 'Price',
        ]);

        $this->crud->addColumn([
            'name' => 'stock',
            'type' => 'text',
            'label' => 'Stock',
        ]);

        $this->crud->addColumn([
            'label' => "Category",
            'type' => "select",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "category",
            'model' => 'App\Models\Category'
        ]);

        $this->crud->addColumn([
            'label' => "Authour",
            'type' => "select",
            'name' => 'authour_id',
            'entity' => 'authour',
            'attribute' => "authour",
            'model' => 'App\Models\Authour'
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProductRequest::class);

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
            'name' => 'price',
            'type' => 'number',
            'label' => 'Price',
        ]);

        $this->crud->addField([
            'name' => 'stock',
            'type' => 'number',
            'label' => 'Stock',
        ]);

        $this->crud->addField([
            'label' => "Category",
            'type' => "relationship",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "name_en",
            'model' => 'App\Models\Category'
        ]);

        $this->crud->addField([
            'label' => "Authour",
            'type' => "relationship",
            'name' => 'authour_id',
            'entity' => 'authour',
            'attribute' => "name_en",
            'model' => 'App\Models\Authour',
            "allows_null" => true,
        ]);

        $this->crud->addField([
            'name' => 'image1',
            'type' => 'image',
            'label' => 'Image 1',
        ]);

        $this->crud->addField([
            'name' => 'image2',
            'type' => 'image',
            'label' => 'Image 2',
        ]);

        $this->crud->addField([
            'name' => 'image3',
            'type' => 'image',
            'label' => 'Image 3',
        ]);

        $this->crud->addField([
            'name' => 'description_ar',
            'type' => 'textarea',
            'label' => 'Description AR',
        ]);

        $this->crud->addField([
            'name' => 'description_en',
            'type' => 'textarea',
            'label' => 'Description EN',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
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
            'name' => 'image1',
            'type' => 'image',
            'label' => 'Image 1',
        ]);

        $this->crud->addColumn([
            'name' => 'image2',
            'type' => 'image',
            'label' => 'Image 2',
        ]);

        $this->crud->addColumn([
            'name' => 'image3',
            'type' => 'image',
            'label' => 'Image 3',
        ]);

        $this->crud->addColumn([
            'name' => 'price',
            'type' => 'text',
            'label' => 'Price',
        ]);

        $this->crud->addColumn([
            'name' => 'stock',
            'type' => 'text',
            'label' => 'Stock',
        ]);

        $this->crud->addColumn([
            'label' => "Category",
            'type' => "select",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "category",
            'model' => 'App\Models\Category'
        ]);

        $this->crud->addColumn([
            'label' => "Authour",
            'type' => "select",
            'name' => 'authour_id',
            'entity' => 'authour',
            'attribute' => "authour",
            'model' => 'App\Models\Authour'
        ]);

        $this->crud->addColumn([
            'name' => 'description_ar',
            'type' => 'text',
            'label' => 'Description AR',
        ]);

        $this->crud->addColumn([
            'name' => 'description_en',
            'type' => 'text',
            'label' => 'Description EN',
        ]);
    }
}
