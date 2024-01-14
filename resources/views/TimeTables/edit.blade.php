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
                        <li class="breadcrumb-item active">Изменения данных</li>
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
                            <h3 class="card-title p-3">Изменения данных</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('timetables.update', $timetable->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="group_id">Группа:</label>
                                    <select name="group_id" class="form-control">
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}" @if($group->id == $timetable->group_id) selected @endif>{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="teacher_id">Учитель:</label>
                                    <select name="teacher_id" class="form-control">
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" @if($teacher->id == $timetable->teacher_id) selected @endif>{{ $teacher->surname }} {{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="classroom_id">Аудитория:</label>
                                    <select name="classroom_id" class="form-control">
                                        @foreach($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}" @if($classroom->id == $timetable->classroom_id) selected @endif>{{ $classroom->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="day">День недели:</label>
                                    <select name="day" class="form-control">
                                        @foreach($weekDays as $id => $week)
                                            <option value="{{ $id }}" @if($id == $timetable->day) selected @endif>{{ $week }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="start_time">Начало урока:</label>
                                    <input type="time" name="start_time" class="form-control" value="{{ $timetable->start_time }}">
                                </div>

                                <div class="form-group">
                                    <label for="end_time">Конец урока:</label>
                                    <input type="time" name="end_time" class="form-control" value="{{ $timetable->end_time }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Обновить</button>
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
<script src="{{ asset('js/students.js') }}"></script>

<!-- /.content-wrapper -->
@endsection
