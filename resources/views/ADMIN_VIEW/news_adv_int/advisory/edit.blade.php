<div class="modal fade" id="edit{{ $adv->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editLabel"> <i class="fas fa-lightbulb "></i> Update Advisory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('advisories.update', $adv )}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">Place</label>
                                <input type="text" class="form-control" name="place" placeholder="Place" value="{{ $adv->place }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">Date and Time</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control @error('dateTime') is-invalid @enderror"  name="dateTime" value="{{ $adv->dateTime }}" id="adv">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">Information</label>
                                <textarea class="form-control" rows="5" name="info"  placeholder="Information" id="info" value="">{{ $adv->info }}</textarea>
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
        $("#adv").flatpickr({
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