<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <p style="font-size: 14px;"><span class="fas fa-exclamation-triangle text-warning"
                    style="font-size: 13px;"></span> Note: Upload image to be displayed in user page.</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class=" mx-auto col-md-8 elevation-3 table table-sm table-bordered table-hovered text-center">
                    <thead class="bg-primary text-light">
                        <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">Images</th>
                    </thead>
                    <tbody>
                        @if ($images->count() > 0)
                            <tr>
                                <td scope="col" class="img d-none d-md-table-cell d-lg-table-cell d-xl-table-cell" style="text-align: center">
                                    @foreach (json_decode($images[0]->image) as $picture)
                                        <img src="{{ asset('uploads/home_images/' . $picture) }}" style="height:60px; width:80px" />
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                    </tbody>        
                </table>
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container mx-auto">
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" style="color:dimgray">Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image[]" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success"><span class="fas fa-save"></span> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
