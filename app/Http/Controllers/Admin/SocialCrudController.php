<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SocialRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class SocialCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Socials'))
        {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Socials'))
        {
            $this->crud->denyAccess(['create','delete','update']);
        }
        $this->crud->setModel('App\Models\Social');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/social');
        $this->crud->setEntityNameStrings('social', 'socials');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'icon',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'link',
            'type' => 'text',
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->addColumn([
            'name' => 'icon',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'link',
            'type' => 'text',
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SocialRequest::class);
        $this->crud->addField([
            'name' => 'icon',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'link',
            'type' => 'text',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
