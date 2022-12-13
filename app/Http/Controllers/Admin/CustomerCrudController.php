<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
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
        if (!backpack_user()->can('View Customers'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Customers'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\CustomerBackPack');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/customer');
        $this->crud->setEntityNameStrings('customer', 'customers');
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
            'name' => 'first_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'last_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
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
        $this->crud->setValidation(CustomerRequest::class);

        $this->crud->addField([
            'name' => 'first_name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'last_name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'email',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'address',
            'type' => 'textarea',
        ]);

        if(request()->route('id')==null){
            $this->crud->addField([
                'name' => 'password',
                'type' => 'password',
            ]);
        }

        $this->crud->addField([
            'name' => 'image',
            'type' => 'image',
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

    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'first_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'last_name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'phone',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'address',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
        ]);
    }
}
