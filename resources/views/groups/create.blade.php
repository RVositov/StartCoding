@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
           @if($errors->any())
                <div class="alert alert-default-danger">
                    @foreach($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> </h1>
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
                            <h3 class="card-title p-3">Добавления нового клиента</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('groups.store') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="name">Названия группы:</label>
                                    <input type="text" name="name" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="course_id">Курс:</label>
                                    <select name="course_id" class="form-control">
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="price">Цена:</label>
                                    <input type="number" name="price" class="form-control" placeholder="" value="250">
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Начало курса:</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="end_date">Конец курса:</label>
                                    <input type="date" name="end_date" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="shift">Смена:</label>
                                    <select name="shift" class="form-control">
                                        <option value="1">Первая смена</option>
                                        <option value="2">Вторая смена</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status_id">Статус:</label>
                                    <select name="status_id" class="form-control">
                                        @foreach($statuses as $status)
                                        <option value="{{$status->id}}">{{$status->status}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <button type="submit" class="btn btn-primary">Добавить</button>
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
