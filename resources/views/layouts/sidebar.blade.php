<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset('dist/img/favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Система логистики</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Vositov Ravshan</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Панель управления</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Предподователи
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('teachers.index')}}" class="nav-link">
                                <i class="fa-solid fa-users nav-icon"></i>
                                <p>Список предподователей</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('teachers.create')}}" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Добавить предподователья</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-people-group "></i>
                        <p>
                            Группы
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('groups.index')}}" class="nav-link">
                                <i class="fa-solid fa-people-line nav-icon"></i>
                                <p>Список групп </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('groups.create')}}" class="nav-link">
                                <i class="fa fa-users-viewfinder nav-icon"></i>
                                <p>Создать группу </p>
                            </a>
                        </li>



                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Студенты
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('students.index')}}" class="nav-link">
                                <i class="fa-solid fa-users nav-icon"></i>
                                <p>Список студентов </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('students.create')}}" class="nav-link">
                                <i class="fa fa-user-plus nav-icon"></i>
                                <p>Добавить студента </p>
                            </a>
                        </li>



                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-days"></i>
                        <p>
                            Расписания
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('timetables.index')}}" class="nav-link">
                                <i class="fa-solid fa-table-list nav-icon"></i>
                                <p>Просмотр </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('timetables.create')}}" class="nav-link">
                                <i class="fa fa-calendar-plus nav-icon"></i>
                                <p>Добавить </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('journals.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-pencil"></i>
                        <p>
                            Журналы
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Доходы
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('incomes.index')}}" class="nav-link">
                                <i class="fa-solid fa-clock-rotate-left nav-icon"></i>
                                <p>Платежы</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('incomes.create')}}" class="nav-link">
                                <i class="fa fa-square-plus nav-icon"></i>
                                <p>Добавить платеж </p>
                            </a>
                        </li>


                    </ul>
                </li>



        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
