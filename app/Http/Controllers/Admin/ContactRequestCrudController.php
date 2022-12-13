<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class ContactRequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContactRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        if (!backpack_user()->can('View Contact Requests'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Contact Requests'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\ContactRequest');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/contact-request');
        $this->crud->setEntityNameStrings('contact request', 'contact requests');
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
            'name' => 'subject',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
        ]);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'subject',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'message',
            'type' => 'textarea',
        ]);
    }
}
