@if($entry->status == 0)
<a  href="javascript:void(0)" onclick="showEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-success" data-button-type="show"><i class="la la-eye"></i>Show</a>
@else
<a  href="javascript:void(0)" onclick="hideEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-danger" data-button-type="hide"><i class="la la-low-vision"></i>Hide</a>
@endif

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>
    function showEntry(id) {
        $("[data-button-type=show]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to show this Governorate?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: false,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/show') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Item Showen</strong><br>The item has been showen successfully."
                        }).show();
                        crud.table.draw(false);
                        $('.modal').modal('hide');
                    },
                    error: function(result) {
                        swal({
                        title: "NOT Showen",
                        text: "There's been an error. Your item might not have been showen.",
                        icon: "error",
                        timer: 4000,
                        buttons: false,
                        });
                        crud.table.draw(false);
                    }
                });
            }
        });
    }

    function hideEntry(id) {
        $("[data-button-type=hide]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to hide this Governorate?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: true,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/hide') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Item Hidden</strong><br>The item has been hidden successfully."
                        }).show();
                        crud.table.draw(false);
                        $('.modal').modal('hide');
                    },
                    error: function(result) {
                        swal({
                        title: "NOT Hidden",
                        text: "There's been an error. Your item might not have been hidden.",
                        icon: "error",
                        timer: 4000,
                        buttons: false,
                        });
                        crud.table.draw(false);
                    }
                });
            }
        });
    }
</script>
@if (!request()->ajax()) @endpush @endif
