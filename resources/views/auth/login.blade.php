@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('login') }}" class="feed-form">
                @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autofocus>
                            {{-- @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>


                    <div class="row">
                        
                        <div class="col-md-12">
                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                            {{-- @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>
                        <button type="submit" class="button_submit">
                            <i class="fas fa-sign-in-alt"></i>  Log In
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
                

@endsection




<style>
    .feed-form {
  margin-top: 40px;
  display: flex;
  flex-direction: column;
  width: 350px;
  justify-content: center;
}

.feed-form input {
  height: 54px;
  border-radius: 5px;
  background: rgb(221, 221, 221);
  margin-bottom: 15px;
  border: black;
  padding: 0 20px;
  font-weight: 300;
  font-size: 15px;
  color: #000000;
  
}

.button_submit:hover, .feed-form input:hover {
  transform: scale(1.009);
  box-shadow: 0px 0px 3px 0px #212529;
}

.button_submit {
  width: 100%;
  height: 50px;
  font-size: 14px;
  color: rgb(255, 255, 255);
   background: rgb(57, 202, 0);

  border-radius: 5px;
  border: none;
  font-weight: 500;
}

</style>