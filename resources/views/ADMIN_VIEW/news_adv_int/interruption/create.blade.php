<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                            <div class="form-group label-floating">
                                <label class="control-label" style="color:dimgray">What</label>
                                <input type="text" class="form-control @error('what') is-invalid @enderror"
                                    rows="1" name="what"></textarea>
                            </div>
                            @error('what')
                                <span>
                                    <div class="alert alert-danger">{{ $message }}</div>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label" style="color:dimgray">When</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control @error('dateTime') is-invalid @enderror"  name="dateTime" value="<?php echo date('Y-m-d h:i A'); ?> to <?php echo date('Y-m-d h:i A'); ?>" id="interruption">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group label-floating">
                                <label class="control-label" style="color:dimgray">Where</label>
                                <input type="text" class="form-control @error('where') is-invalid @enderror"
                                    rows="" name="where">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group label-floating">
                                <label class="control-label" style="color:dimgray">Why</label>
                                <textarea class="form-control @error('why') is-invalid @enderror" rows="3" name="why"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
