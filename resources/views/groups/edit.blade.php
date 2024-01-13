@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Изменения</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Изменения курса</li>
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
                                <h3 class="card-title p-3">Изменения курса</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('groups.update', $group->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input type="text" class="form-control" name="name" value="{{ $group->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Цена:</label>
                                        <input type="number" class="form-control" name="price" value="{{ $group->price }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Дата начала:</label>
                                        <input type="date" class="form-control" name="start_date" value="{{ $group->start_date }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Дата окончание:</label>
                                        <input type="date" class="form-control" name="end_date" value="{{ $group->end_date }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="shift">Shift:</label>
                                        <select class="form-control" name="shift">
                                            <option value="1" {{ $group->shift == 1 ? 'selected' : '' }}>Shift 1</option>
                                            <option value="2" {{ $group->shift == 2 ? 'selected' : '' }}>Shift 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="status_id" id="status_id" class="form-control">
                                            @foreach($group_statuses as $group_status)
                                                <option value="{{$group_status->id}}" {{ $group->status_id == $group_status->id ? 'selected' : '' }}>{{$group_status->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Изменить</button>
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
