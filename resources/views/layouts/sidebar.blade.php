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
                            Клиенты
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('client')}} " class="nav-link">
                                <i class="fa-solid fa-users nav-icon"></i>
                                <p>Список клиентов</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('client.create')}}" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Добавить клиента</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('code.create')}}" class="nav-link">
                                <i class="fa fa-code nav-icon"></i>
                                <p>Создания кода для клиента</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('code.index')}}" class="nav-link">
                                <i class="fa fa-code nav-icon"></i>
                                <p>Список кодов клиента</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Груз
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cargo.create')}}" class="nav-link">
                                <i class="fa fa-truck-arrow-right nav-icon"></i>
                                <p>Добавить груза</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cargo.index')}} " class="nav-link">
                                <i class="fa-solid fa-truck-fast nav-icon"></i>
                                <p>Список грузов</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cargo.index')}} " class="nav-link">
                                <i class="fa-solid fa-list-check nav-icon"></i>
                                <p>Содержимое груза</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-invoice"></i>
                        <p>
                            Инвойс
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('invoice')}}" class="nav-link">
                                <i class="fa fa-file-lines  nav-icon"></i>
                                <p>Список инвойсов</p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('invoice.create')}}" class="nav-link">
                                <i class="fa-solid fa-calendar-plus nav-icon "></i>
                                <p>Добавить инвойс</p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('invoice.client')}}" class="nav-link">
                                <i class="fa-solid fa-calendar-plus nav-icon "></i>
                                <p>Инвойс по клиентам</p>
                            </a>

                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>
                            Склад
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('invoice')}}" class="nav-link">
                                <i class="fa fa-file-lines  nav-icon"></i>
                                <p>Список инвойсов</p>
                            </a>

                        </li>


                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Долги
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('unpaid-clients')}}" class="nav-link">
                                <i class="fa-solid fa-money-check-dollar nav-icon"></i>
                                <p>Должники</p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-money-bill-trend-up  nav-icon"></i>
                                <p>Клиенты с + балансом</p>
                            </a>

                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-wallet"></i>
                        <p>
                            Приход
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cash.income')}}" class="nav-link">
                                <i class="fa-solid fa-folder-plus nav-icon"></i>
                                <p>Новый приход</p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('cash.income-list')}}" class="nav-link">
                                <i class="fa-solid fa-landmark nav-icon"></i>
                                <p>История прихода</p>
                            </a>

                        </li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-check-dollar"></i>
                        <p>
                            Расход
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('expense.create')}}" class="nav-link">
                                <i class="fa-solid fa-folder-plus nav-icon"></i>
                                <p>Новый расход</p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('expense.list')}}" class="nav-link">
                                <i class="fa-solid fa-landmark nav-icon"></i>
                                <p>История расходов</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Отчёт
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-calendar-days nav-icon"></i>
                                <p>Отчёт по итогу меясца</p>
                            </a>

                        <li class="nav-item">
                            <a href="{{route('expense.index')}}" class="nav-link">
                                <i class="fa-solid fa-landmark nav-icon"></i>
                                <p>Расход</p>
                            </a>
                        </li>

                        </li>

                    </ul>

                </li>

                <!-- <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-table"></i>
                         <p>
                             Tables
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Simple Tables</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>DataTables</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>jsGrid</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
