@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-secondary">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">Информация об инвойсах</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="btn bg-gradient-info" href="{{ route('invoice.create') }}">
                                        <i class="fa-solid fa-calendar-plus"></i>&nbsp; Добавить новый инвойс

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.invoice table -->
                        <form action="" method="get">
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <table id="invoiceDetailsTable" class="table table-sm table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Фио клиента</th>
                                        <th>Телефон</th>
                                        <th>Сумма</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <dd>{{print_r($unpaid_list)}}</dd>
                                    @foreach($unpaid_list as $item)
                                        <tr>
                                           <td>{{$loop->iteration}}</td>
                                           <td>{{$item->fio}}</td>
                                           <td>{{$item->phone}}</td>
                                           <td>{{$item->summ}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>

                                <button class="btn btn-primary"  type="button"   onclick="cloneCleanRow()">Добавить строку</button>
                                <button class="btn btn-primary"  onclick="calculateCube()">Сохранить в базу</button>

                            </div>
                        </form>

                        <!-- /.invoice table -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

    <div id="openModal">
        <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection



