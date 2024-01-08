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
                            <form action="{{ route('admin.client.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Фамилия Имя Отчество:</label>
                                    <input type="text" name="fio" class="form-control" placeholder="ФИО">
                                </div>
                                <div class="form-group">
                                    <label>Телефон:</label>
                                    <div class="input-group">
                                        <input type="tel" name="phone" class="form-control" placeholder="+992927123456">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Адрес:</label>
                                    <div class="input-group">
                                        <input type="text" name="address" class="form-control" placeholder="+992927123456">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Дополнительная информация:</label>
                                    <div class="input-group">
                                        <textarea name="info" class="form-control" rows="4" placeholder="Дополнительная информация"> </textarea>
                                    </div>
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
