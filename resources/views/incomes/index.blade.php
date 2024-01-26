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
                @if($errors->any())
                    <div class="alert alert-default-danger">
                        @foreach($errors->all() as $error)
                            {{$error}} <br>
                        @endforeach
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Студент</h1>
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
                                <h3 class="card-title p-3">Отслеживание оплат </h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item">
                                        <a class="btn bg-gradient-info" href="{{ route('incomes.create') }}">
                                            <i class="fa-solid fa-calendar-plus"></i>&nbsp; Добавить
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">

                                    <form action="{{ route('incomes.index') }}" method="GET" >
                                        <div class="row" style="margin-bottom:10px;">
                                            <div class="col-sm-4">
                                                <label for="start_date">Начальная дата: </label>
                                                <input  class="form-control" type="date" name="start_date" value="{{ request('start_date') }}" >
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="end_date">Конечная дата:</label>
                                                <input  class="form-control" type="date" name="end_date" value="{{ request('end_date') }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="end_date"> &nbsp;</label>
                                                <button class="form-control btn btn-outline-info" type="submit">Фильтр по датам</button>
                                            </div>
                                        </div>
                                    </form>


                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incomes as $income)
                                        <tr>
                                            <td>{{ $income->id }}</td>
                                            <td>
                                                @if($income->student)
                                                    {{ $income->student->name }} {{ $income->student->surname }}
                                                @else
                                                    No Student
                                                @endif
                                            </td>
                                            <td>{{ $income->price }}</td>
                                            <td>{{ $income->date }}</td>
                                            <td>{{ $income->created_at }}</td>
                                            <td>{{ $income->updated_at }} </td>
                                            <td>
                                                <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                @if($income->student)
                                                    <a href="{{ route('incomes.showStudent', $income->student->id) }}" class="btn btn-info btn-sm">Отслеживать студента</a>
                                                @else
                                                    Студент недоступен
                                                @endif
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
