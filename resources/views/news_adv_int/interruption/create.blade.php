<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><i class="fa fa-spinner fa-spin"></i> Create Interruption :</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('interruptions.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container">

                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">WHAT:</label>
                                    <input type="text" class="form-control @error('what') is-invalid @enderror"
                                        rows="1" name="what"></textarea>
                                </div>
                                @error('what')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row ">
                            <label class="col-form-label">WHEN:</label>
                            <div class="col-5 mb-4">
                                <div class="input-group date">
                                    <input type="text" class="form-control @error('dateTime') is-invalid @enderror"
                                        name="dateTime" id="datetimes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">WHERE:</label>
                                    <input type="text" class="form-control @error('where') is-invalid @enderror"
                                        rows="" name="where">
                                </div>
                                @error('where')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">WHY:</label>
                                    <textarea class="form-control @error('why') is-invalid @enderror" rows="1" name="why"></textarea>
                                </div>
                                @error('why')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
