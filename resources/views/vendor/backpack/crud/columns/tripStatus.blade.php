@if ($entry->status == 0)
    <span class="badge badge-warning text-white">Looking For Driver</span>
@endif

@if ($entry->status == 1)
    <span class="badge badge-primary">Driver Accepted</span>
@endif

@if ($entry->status == 2)
    <span class="badge badge-info">Driver Arrived</span>
@endif

@if ($entry->status == 3)
    <span class="badge badge-success">Ongoing Trip(Started)</span>
@endif

@if ($entry->status == 4)
    <span class="badge badge-danger">Finished</span>
@endif

@if ($entry->status == 5)
    <span class="badge badge-danger">Canceled By Client</span>
@endif

@if ($entry->status == 6)
    <span class="badge badge-danger">Canceled By Driver</span>
@endif
