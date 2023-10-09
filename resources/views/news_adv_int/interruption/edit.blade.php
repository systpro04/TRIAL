<div class="modal fade" id="edit{{$int->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editLabel"><i class="fas fa-exclamation"></i> Update Interruption</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('interruptions.update', $int->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">What</label>
                                <input type="text" class="form-control" rows="1" name="what" value="{{ old('what', $int->what )}} "></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">When</label>
                                <input type="text" class="form-control" name="dateTime" id="int" value="{{ old('dateTime', $int->dateTime ) }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Where</label>
                                <input type="text" class="form-control" name="where" value="{{ old('where', $int->where ) }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Why</label>
                                <textarea class="form-control" rows="1" name="why" value="">{{ old('why', $int->why )}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>
<script>
    $(document).ready(function () {
        $('#int').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
    });
</script>