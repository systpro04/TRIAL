
{{-- <div style="background: teal;border-bottom: 3px solid goldenrod;">
    <div class="container">
        <img src="{{ asset('images/users/flames.png') }}" style="height: 35px; width: 35px; border-radius: 50%;"> Trial and Error
    </div>
</div> --}}

<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Help</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">FAQ</a>
                <a class="dropdown-item" href="#">Support</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Contact</a>
            </div>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">

            </ul>
            <ul class="navbar-nav ms-auto" style="color: chartreuse">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"> Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle" style="color: chartreuse"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" onclick="confirmLogout();">Logout</a>
                        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </ul>
</nav>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>