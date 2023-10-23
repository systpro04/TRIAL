<div class="modal fade" id="edit{{$int->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                                <label class="control-label" style="color:dimgray">What</label>
                                <input type="text" class="form-control" rows="1" name="what" value="{{ $int->what }} "></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">When</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control"  name="dateTime" value="{{ $int->dateTime }}" id="int">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">Where</label>
                                <input type="text" class="form-control" name="where" value="{{ $int->where }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">Why</label>
                                <textarea class="form-control" rows="3" name="why" value="">{{  $int->why }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Save">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function () {
        $("#int").flatpickr({
            altInput: true,
            enableTime: true,
            startDate: moment().startOf("hour"),
            endDate: moment().startOf("hour").add(12, "hour"),
            dateFormat: "Y-m-d h:i K",
            mode: "range",
            weekNumbers: true
        });
    });
</script>