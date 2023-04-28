<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('personal.main.index') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Main
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('personal.liked.index') }}" class="nav-link">
                <i class="nav-icon fas fa-heart"></i>
                <p>
                    Favorite
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('personal.comment.index') }}" class="nav-link">
                <i class="nav-icon fas fa-comment"></i>
                <p>
                    Comments
                </p>
            </a>
        </li>

    </ul>
    <div class="sidebar">

    </div>
    <!-- /.sidebar -->
</aside>
