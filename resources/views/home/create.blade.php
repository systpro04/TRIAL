<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p style="font-size: 14px;"><span class="fas fa-exclamation-triangle text-warning" style="font-size: 13px;"></span> Note: Please use images with same size.</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <table class=" mx-auto col-md-8 elevation-3 table table-sm table-bordered table-hovered text-center">
                    <thead class="bg-primary text-light">
                        <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Images</th>
                    </thead>
                    {{-- <tbody>
                        @foreach ($img as $imgs)
                            <tr>
                                <td scope="col" class="img d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                    style="text-align: center"> <?php foreach (json_decode($imgs->images) as $picture) { ?>
                                    <img src="{{ asset('uploads/home_images/' . $picture) }}" style="height:60px; width:80px" />
                                    <?php } ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                </table>

                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
                    id="image-form">
                    @csrf
                    <div class="container mx-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Images (Max:3)</label>
                                    <input type="file" name="images[]" class="form-control" id="id_home_images" required multiple>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><span class="fas fa-save"></span> Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
