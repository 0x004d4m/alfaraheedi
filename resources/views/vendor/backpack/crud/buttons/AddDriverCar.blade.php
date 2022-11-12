@if($entry->cars == 0)
<a  href="javascript:void(0)" onclick="blockEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-primary" data-button-type="block"><i class="la la-plus"></i>Add Car</a>
@endif
