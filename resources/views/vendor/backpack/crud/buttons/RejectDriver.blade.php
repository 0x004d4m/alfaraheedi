@if($entry->approved == 0)
<a  href="javascript:void(0)" onclick="rejectEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-danger" data-button-type="reject"><i class="la la-close"></i>Reject Driver</a>
@endif

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>
    function rejectEntry(id) {
        $("[data-button-type=reject]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to reject this driver?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: false,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/Reject') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Driver Reject</strong><br>The driver has been rejected successfully."
                        }).show();
                        crud.table.draw(false);
                        $('.modal').modal('hide');
                    },
                    error: function(result) {
                        swal({
                        title: "NOT Rejected",
                        text: "There's been an error. Your driver might not have been rejected.",
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
