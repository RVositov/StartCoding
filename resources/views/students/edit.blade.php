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
                            <form method="POST" action="{{ route('students.update', $student->id) }}" >
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Имя:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ $student->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="surname">Фамилия:</label>
                                    <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="{{ $student->surname }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Телефон:</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Телефон" value="{{ $student->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="birthday">Дата рождения:</label>
                                    <input type="date" name="birthday" class="form-control" placeholder="Дата рождения" value="{{ $student->birthday }}">
                                </div>

                                <div class="form-group">
                                    <label for="class">Адрес:</label>
                                    <input type="text" name="address" class="form-control" placeholder="Адрес" value="{{ $student->address }}">
                                </div>

                                <div class="form-group">
                                    <label for="class">Класс:</label>
                                    <input type="number" name="class" class="form-control" placeholder="Класс" value="{{ $student->class }}">
                                </div>

                                <div class="form-group">
                                    <label for="class">Город:</label>
                                    <select name="city_id" id="citySelect" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == $student->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="class">Школа:</label>
                                    <select name="school_id" id="schoolSelect" class="form-control">
                                        @foreach($schools as $school)
                                            <option value="{{ $school->id }}" {{ $school->id == $student->school_id ? 'selected' : '' }}>{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="class">Группы:</label>
                                    <select name="groups_id[]" id="groupsSelect" class=" form-control select2" multiple="multiple">
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}" {{ in_array($group->id, $student->groups->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="class">Скидки:</label>
                                    <input type="number" name="discount" value="{{ $student->discount }}" class="form-control" placeholder="Скидки">
                                </div>

                                <div class="form-group custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" name="is_active" class="custom-control-input" id="customSwitch3" {{ $student->is_active ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customSwitch3">Активность</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Изменить</button>
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
