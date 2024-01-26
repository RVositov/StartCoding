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
                        <h1>Добавления нового расхода</h1>
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
                                <h3 class="card-title p-3">Добавления нового расхода</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('expenses.store') }}" method="POST">
                                    @csrf
                                    <label for="expense_type_id">Тип расходов:</label>
                                    <select name="expense_type_id" class="form-control" required>
                                        @foreach($expenseTypes as $expenseType)
                                            <option value="{{ $expenseType->id }}">{{ $expenseType->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="name" >Название:</label>
                                    <input type="text" name="name" class="form-control" required>
                                    <label for="date" >Дата:</label>
                                    <input type="date" name="date" class="form-control" required>

                                    <label for="price">Сумма:</label>
                                    <input type="number" name="price" step="0.01" class="form-control" required>

                                    <label for="comment">Коментария:</label>
                                    <input type="text" name="comment" step="0.01" class="form-control" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
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
