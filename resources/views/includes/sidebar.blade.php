<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">LMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image')}}">
            </div>
            <div class="info">
                <a href="{{route('home')}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                           Batch


                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('batch.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Batch</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('batch.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-school"></i>
                        <p>
                            Faculty
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('faculty.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('faculty.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           Book


                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('book.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('book.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-male"> </i>
                        <p>
                            Student

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('student.create')}} " class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('student.index')}} " class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Announcement
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('announcement.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('announcement.index')}}" class="nav-link">
                                <i class="nav-icon far fa-circle nav-icon"></i>
                                <p>list</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Book Issue

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('issue.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Issue Book</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('issue.index')}}" class="nav-link">
                                <i class="nav-icon far fa-circle nav-icon"></i>
                                <p>Issued list</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
