@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-default-info">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Расход</h1>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Информация о расходах</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item">
                                        <a class="btn bg-gradient-info" href="{{ route('expenses.create') }}">
                                            <i class="fa-solid fa-calendar-plus"></i>&nbsp; Добавить расход
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Тип расхода</th>
                                        <th>Направление</th>
                                        <th>Комент</th>
                                        <th>Дата</th>
                                        <th>Сумма</th>
                                        <th>Введен</th>
                                        <th>Дата введения</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->id }}</td>
                                            <td>{{ $expense->expenseType ? $expense->expenseType->name : 'N/A' }}</td>
                                            <td>{{ $expense->name }}</td>
                                            <td>{{ $expense->comment }}</td>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->price }}</td>
                                            <td>{{ $expense->enteredBy->name }}</td>
                                            <td>{{ $expense->created_at }}</td>
                                            <td>

                                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>&nbsp; Редактировать
                                                </a>

                                                <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"  onclick="return confirm('Вы уверены, что хотите удалить этого расхода?')">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

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
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
