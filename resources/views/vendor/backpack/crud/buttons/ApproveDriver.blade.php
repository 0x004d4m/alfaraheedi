@if($entry->approved == 0)
<a  href="javascript:void(0)" onclick="approveEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-success" data-button-type="approve"><i class="la la-check"></i>Approve Driver</a>
@endif

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>
    function approveEntry(id) {
        $("[data-button-type=approve]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to approve this driver?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: false,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/Approve') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Driver Approved</strong><br>The driver has been approved successfully."
                        }).show();
                        crud.table.draw(false);
                        $('.modal').modal('hide');
                    },
                    error: function(result) {
                        swal({
                        title: "NOT Approved",
                        text: "There's been an error. Your driver might not have been approved.",
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
