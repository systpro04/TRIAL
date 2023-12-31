<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><i class="fa fa-spinner fa-spin"></i>Create News :</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="container">
                        <div class="row">
                            <div class="mb-3 ">
                                <div class="form-group">
                                    <label class="control-label" style="color:dimgray">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" placeholder="Title" value="{{ old('title') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control @error('dateTime') is-invalid @enderror"  name="dateTime" value="<?php echo date('Y-m-d h:i A')?>" id="news">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">Article</label>
                                <textarea class="form-control @error('article') is-invalid @enderror" rows="3" name="article"
                                    placeholder="Article">{{ old('article') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" style="color:dimgray">Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image[]" multiple>
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
        $("#news").flatpickr({
            altInput: true,
            enableTime: true,
            endDate: moment().startOf("hour").add(12, "hour"),
            dateFormat: "Y-m-d h:i K",
            weekNumbers: true
        });

    });
</script>