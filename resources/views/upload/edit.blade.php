<div class="modal fade" id="edit{{ $upload->id }}" tabindex="-1" role="dialog" aria-labelledby="editLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editLabel"><i class="fas fa-newspaper"></i> Update News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('upload.update', $upload) }}" method="POST"
                    enctype="multipart/form-data" id="update-form">
                    @csrf
                    @method('PUT')

                    <div class="container mx-auto">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Title: </label>
                                <input type="text" class="form-control" name="title" value="{{ $upload->title }}" required>
                            </div>
                        </div>

                        <div class="col-md-12 text-center mx-auto">
                            <video style=" height: 100%; width:100%;" class="text-center col-md-12" controls>
                                <source src="{{ URL::asset('uploads/videos/' . $upload->file) }}" style=" height: 200px; width:100%;" type="video/mp4">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Upload Video <span class="text-danger"></label>
                            <input type="file" class="form-control" name="file" value="{{ $upload->file }}" id="video">
                            @if ($errors->has('file'))
                                {{ $errors->first('file') }}
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="loading" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; display: none;">
    <img src="{{ asset('loading/load.gif') }}" style="height: 70px; width: 70px;" alt="Loading...">
</div>
<script>
    const updateform = document.getElementById('update-form');
    const updateloading = document.getElementById('loading');
    
    updateform.addEventListener('submit', () => {
        updateloading.style.display = 'block';
    });

    updateform.addEventListener('load', () => {
        updateloading.style.display = 'none';
    });

    updateform.addEventListener('error', () => {
        updateloading.style.display = 'none';
    });
</script>