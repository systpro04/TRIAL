<div class="modal fade" id="edit{{ $new->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editLabel"><i class="fas fa-newspaper"></i> Update News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('news.update', $new) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $new->title }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control"  name="dateTime"  value="{{ old('dateTime', $new->dateTime ) }}" id="editnews">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Article</label>
                                <textarea class="form-control" rows="5" name="article" placeholder="Article" value="">{{ $new->article }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" type="file" name="image[]" accept="image/*" multiple>
                                <small>Leave blank if you don't want to change image.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
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
        $("#editnews").flatpickr({
            altInput: true,
            enableTime: true,
            startDate: moment().startOf("hour"),
            endDate: moment().startOf("hour").add(32, "hour"),
            dateFormat: "Y-m-d H:i K",
            weekNumbers: true
        });
    });
</script>