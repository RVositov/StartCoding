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
                            <h3 class="card-title p-3">Изменения клиентских данных</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.client.update', $client->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Фамилия Имя Отчество:</label>
                                    <input type="text" name="fio" class="form-control"
                                    placeholder="Enter event name" value="{{ $client->fio }}">
                                </div>
                                <div class="form-group">
                                    <label>Телефон:</label>
                                    <input type="tel" name="phone" class="form-control"
                                           placeholder="+992921234567" value="{{ $client->phone }}">
                                </div>
                                <div class="form-group">
                                    <label>Адрес:</label>
                                    <input type="text" name="address" class="form-control"
                                           placeholder="" value="{{ $client->address }}">
                                </div>
                                <div class="form-group">
                                    <label>Дополнительная информация:</label>
                                    <textarea class="form-control" name="info">{{ $client->info }}</textarea>
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

<!-- /.content-wrapper -->
@endsection
