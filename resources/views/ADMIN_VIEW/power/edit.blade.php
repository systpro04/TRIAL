<div class="modal fade" id="edit{{ $pow->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editLabel"> <i class="fas fa-lightbulb "></i> Update Advisory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('power.update', $pow )}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Capacity</label>
                                <input type="text" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ $pow->capacity }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Morning</label>
                                <input type="number" class="form-control @error('morning') is-invalid @enderror" name="morning" value="{{ $pow->morning }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Afternoon</label>
                                <input type="number" class="form-control @error('afternoon') is-invalid @enderror" name="afternoon" value="{{ $pow->afternoon }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Evening</label>
                                <input type="number" class="form-control @error('evening') is-invalid @enderror" name="evening" value="{{ $pow->evening }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary mt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Save">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
