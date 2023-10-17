<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><i class="fa fa-spinner fa-spin"></i>Upload Video :</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" id="add-form">
                    @csrf
                    <div class="container mx-auto">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Title:</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" style="color:dimgray">Upload Video <span class="text-danger"></label>
                                <input type="file" class="form-control" name="file" id="video" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-2" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="loading" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; display: none;">
    <img src="{{ asset('loading/load.gif') }}" style="height: 70px; width: 70px;" alt="Loading...">
</div>
<script>
    const VideoInput = document.querySelector('#video');
    const VideoSubmitButton = document.querySelector('#submit');
    VideoSubmitButton.disabled = true;
    VideoInput.addEventListener('change', function() {
        if (this.files.length > 0 && !this.files[0].name.match(/\.(mp4|ogg|webm)$/i)) {
            VideoSubmitButton.disabled = true;
            alert('Please select MP4, OGG or WEBM ');
        } else {
            VideoSubmitButton.disabled = false;
        }
    });

    const addform = document.getElementById('add-form');
    const addloading = document.getElementById('loading');
    addform.addEventListener('submit', () => {
        addloading.style.display = 'block';
    });

    addform.addEventListener('load', () => {
        addloading.style.display = 'none';
    });

    addform.addEventListener('error', () => {
        addloading.style.display = 'none';
    });

</script>
