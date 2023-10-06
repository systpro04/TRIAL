<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
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
                                <div class="form-group label-floating">
                                    <label class="control-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                        placeholder="Title" value="{{ old('title') }}">
            
                                </div>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Date</label>
                                    <input type="text" class="form-control @error('dateTime') is-invalid @enderror"
                                        name="dateTime" id="dateTime" value="{{ old('dateTime') }}" placeholder="Date">
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Article</label>
                                    <textarea class="form-control @error('article') is-invalid @enderror" rows="3" name="article"
                                        placeholder="Article">{{ old('article') }}</textarea>
                                </div>
                                @error('article')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image[]"
                                    multiple>
                            </div>
                            <div id="image-preview" alt="No Available Image"></div>
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
            
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                        <a href="#" class="btn btn-sm btn-warning mt-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


