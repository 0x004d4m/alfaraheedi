<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

class ContactRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

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
