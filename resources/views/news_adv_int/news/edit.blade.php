<div class="modal fade" id="edit{{ $new->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
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
                                {{-- <input type="text" class="form-control" name="dateTime" id="dateTime" value="{{ Carbon\Carbon::parse($new)->format('m/d/y') }}"> --}}
                                <input type="text" class="form-control" name="dateTime" id="dateTime" value="{{ $new->dateTime }}">
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
