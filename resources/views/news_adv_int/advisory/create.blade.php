<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><i class="fa fa-spinner fa-spin"></i>Create New Advisory :</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('advisories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="mb-3 ">
                                <div class="form-group label-floating">
                                    <label class="control-label">Place</label>
                                    <input type="text" class="form-control @error('place') is-invalid @enderror"
                                        name="place" placeholder="Place" value="{{ old('place') }}">
                                </div>
                                @error('place')
                                    <span>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Date and Time</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control float-right @error('dateTime') is-invalid @enderror" name="dateTime" id="dateTime" value="{{ old('dateTime') }}">
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Information</label>
                                    <textarea class="form-control @error('info') is-invalid @enderror " rows="4" name="info"
                                        placeholder="Information">{{ old('info') }}</textarea>
                                </div>
                                @error('info')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                        <a href="{{ route('advisories.index') }}" class="btn btn-sm btn-warning mt-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
