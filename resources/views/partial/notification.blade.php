@if(session('success'))
<div class="modal fade" id="overlay">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>{{session('success')}}</p>
            </div>
        </div>
    </div>
</div>
@endif


@if(session('error'))
<div class="modal fade" id="overlay">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>{{session('error')}}</p>
            </div>
        </div>
    </div>
</div>
@endif
@push('scripts')
<script>
    $('#overlay').modal('show');

    setTimeout(function() {
        $('#overlay').modal('hide');
    }, 3000);
</script>
@endpush