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
                        <h1>Создание группы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Event</li>
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
                        <div class="card card-outline card-info">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Создание новой группы</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('groups.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Название:</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Цена:</label>
                                        <input type="number" class="form-control" name="price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Дата начала:</label>
                                        <input type="date" class="form-control" name="start_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Дата окончание Date:</label>
                                        <input type="date" class="form-control" name="end_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="shift">Shift:</label>
                                        <select class="form-control" name="shift">
                                            <option value="1">Shift 1</option>
                                            <option value="2">Shift 2</option>
                                        </select>
                                    </div>
                                    <select name="status_id" id="statusSelect" class="form-control">
                                        @foreach($group_statuses as $status)
                                            <option value="{{$status->id}}">{{$status->status}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary">Создать</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection
