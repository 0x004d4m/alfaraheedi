<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
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
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');
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
            'name' => 'image',
            'type' => 'image',
            'label' => 'Image',
        ]);

        $this->crud->addColumn([
            'name' => 'type',
            'type' => 'text',
            'label' => 'Type',
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

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
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
}
