@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @if(isset($success) && $success)
                    <div class="alert alert-default-success">
                        {{ $success }}
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
                        <h1>Клиенты</h1>
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
                                <h3 class="card-title p-3">Информация о курсах</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item">
                                        <a class="btn bg-gradient-info" href="{{ route('courses.create') }}">
                                            <i class="fa-solid fa-calendar-plus"></i>&nbsp; Добавить курс
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->id }}</td>
                                            <td>{{ $course->name }}</td>
                                            <td>
                                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View</a>
                                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
