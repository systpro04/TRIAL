<div class="modal fade" id="newsView-{{ $new->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h4 class="modal-title" id="myModalLabel">NEWS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <h3 class="text-dark text-center mt-3" style="font-weight: bolder;">{{ $new->title }}</h3>
                <small> <h6 class="text-muted text-center mx-3 mt-2">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i A', $new->dateTime)->format('M. d, Y h:i A') }}


                </h6></small>
                <hr>
                <div class="modal-body">
                <p class=" text-dark" style="padding-left: 10px; padding-right: 10px;"> {{$new->article}} </p>
                </div>
                @foreach (json_decode($new->image, true) as $img)
                <div>
                    <figure style="box-shadow: 2px 4px 8px rgba(0,0,0,0.4); ">
                        <img style="padding: 5px; height: 30%; width: 100%; padding-left: 20px; padding-right: 20px;" src="{{  url('uploads/news/' . $img) }}" alt="Image">
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
</div>