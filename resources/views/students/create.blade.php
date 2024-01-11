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
                        <h1>Добавления клиента</h1>
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
                                <form action="{{ route('students.store') }}" method="post" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Имя:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Имя">
                                    </div>

                                    <div class="form-group">
                                        <label for="surname">Фамилия:</label>
                                        <input type="text" name="surname" class="form-control" placeholder="Фамилия">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Телефон:</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="Телефон">
                                    </div>

                                    <div class="form-group">
                                        <label for="birthday">Дата рождения:</label>
                                        <input type="date" name="birthday" class="form-control" placeholder="Дата рождения">
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Адрес:</label>
                                        <input type="address" name="address" class="form-control" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Класс:</label>
                                        <input type="number" name="class" class="form-control" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Город:</label>
                                        <select name="city_id" id="citySelect" class="form-control">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Школа:</label>
                                        <select name="school_id" id="schoolSelect" class="form-control">
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Группы:</label>
                                        <select name="groups_id[]" id="" class="select2 form-control" multiple="multiple">
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Скидки:</label>
                                        <input type="discount" name="class" value="0" class="form-control" placeholder="">
                                    </div>

                                    <div class="form-group custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" name="is_active" class="custom-control-input" id="customSwitch3" checked="checked">
                                        <label class="custom-control-label" for="customSwitch3">Активность</label>
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
    <script src="{{ asset('js/students.js') }}"></script>
@endsection
