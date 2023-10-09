<div class="form-inline mt-2">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-header text-primary">Admin Management</li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt  text-warning"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th-list text-warning"></i>
                <p>Modules
                    <i class="right fas fa-angle-left text-warning"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item mt-2">
                    <a href="{{ route('news.index') }}" class="nav-link {{ request()->is('news*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper text-primary"></i>
                        <p>News</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('advisories.index') }}" class="nav-link {{ request()->is('advisories*') ? 'active' : '' }}">
                        <i class="fas fa-lightbulb nav-icon text-primary"></i>
                        <p>Advisories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('interruptions.index') }}" class="nav-link {{ request()->is('interruptions*') ? 'active' : '' }}">
                        <i class="fas fa-exclamation nav-icon text-primary"></i>
                        <p>Interruptions</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('upload.index') }}" class="nav-link {{ request()->is('upload*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-upload  text-warning"></i>
                <p>Upload Videos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link {{ request()->is('search*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt text-warning"></i>
                <p>Inquiry</p>
            </a>
        </li>
    </ul>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navTreeview = document.querySelector('.nav-treeview');
        const hasActiveChild = Array.from(navTreeview.children).some(child => {
            return child.querySelector('.nav-link').classList.contains('active');
        });

        if (hasActiveChild) {
            navTreeview.style.display = 'block';
        } else {
            navTreeview.style.display = 'none';
        }
    });
</script>
