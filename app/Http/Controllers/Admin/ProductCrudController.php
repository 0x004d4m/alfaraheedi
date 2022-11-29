<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        // 'name_ar',
        // 'name_en',
        // 'description_ar',
        // 'description_en',
        // 'price',
        // 'image1',
        // 'image2',
        // 'image3',
        // 'stock',
        // 'category_id',
        // 'authour_id',
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
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

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
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

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Define what happens when the Show operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
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
