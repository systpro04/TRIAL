<div class="modal fade" id="edit{{ $adv->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
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
                                <label class="control-label">Place</label>
                                <input type="text" class="form-control" name="place" placeholder="Place" value="{{ old('place',$adv->place) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Date</label>
                                {{-- <input type="text" class="form-control" name="dateTime" id="dateTime" value="{{ Carbon\Carbon::parse($adv->dateTime)->format('m/d/y') }}"> --}}
                                <input type="text" class="form-control" name="dateTime" id="dateTime" value="{{ old('dateTime', $adv->dateTime ) }}">

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Information</label>
                                <textarea class="form-control" rows="5" name="info"  placeholder="Information" id="info" value="">{{old('info') ?? $adv->info}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
