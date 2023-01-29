{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

@if(backpack_user()->can('View Categories'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-question"></i> Categories</a></li>
@endif
@if(backpack_user()->can('View Authours'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('authour') }}"><i class="nav-icon la la-question"></i> Authours</a></li>
@endif
@if(backpack_user()->can('View Publishers'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('publisher') }}"><i class="nav-icon la la-question"></i> Publishers</a></li>
@endif
@if(backpack_user()->can('View Products'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-question"></i> Products</a></li>
@endif
@if(backpack_user()->can('View Customers'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('customer') }}"><i class="nav-icon la la-question"></i> Customers</a></li>
@endif
@if(backpack_user()->can('View Orders'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('orders') }}"><i class="nav-icon la la-question"></i> Orders</a></li>
@endif
@if(backpack_user()->can('View Drivers'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('driver') }}"><i class="nav-icon la la-question"></i> Drivers</a></li>
@endif
@if(backpack_user()->can('View Contact Requests'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact-request') }}"><i class="nav-icon la la-question"></i> Contact requests</a></li>
@endif
@if(backpack_user()->can('View Partners'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('partner') }}"><i class="nav-icon la la-question"></i> Partners</a></li>
@endif
@if(backpack_user()->can('View Socials'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('social') }}"><i class="nav-icon la la-question"></i> Socials</a></li>
@endif
@if(backpack_user()->can('Manage Settings'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('setting') }}"><i class="nav-icon la la-question"></i> Settings</a></li>
@endif
@if(backpack_user()->can('Manage Discounts'))
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('discount') }}"><i class="nav-icon la la-question"></i> Discounts</a></li>
@endif
@if(backpack_user()->can('Manage Authentication'))
    <!-- Users, Roles, Permissions -->
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        </ul>
    </li>
@endif
@if(backpack_user()->can('Manage Logs'))
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>
@endif
@if(backpack_user()->can('Manage Languages'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Translations</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language') }}"><i class="nav-icon la la-flag-checkered"></i> Languages</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language/texts') }}"><i class="nav-icon la la-language"></i> Site texts</a></li>
        </ul>
    </li>
@endif

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('db') }}"><i class="nav-icon la la-question"></i> Dbs</a></li>