@if($entry->reject_count > 0)
<a  href="javascript:void(0)" onclick="resetCountEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-danger" data-button-type="reset"><i class="la la-redo-alt"></i>Reset Count</a>
@endif

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>
    function resetCountEntry(id) {
        $("[data-button-type=reset]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to reset this driver count?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: false,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/resetCount') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Driver Counter Reseted</strong><br>The driver Counter has been Reseted successfully."
                        }).show();
                        crud.table.draw(false);
                        $('.modal').modal('hide');
                    },
                    error: function(result) {
                        swal({
                        title: "NOT Reseted",
                        text: "There's been an error. Your driver counter might not have been reseted.",
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
