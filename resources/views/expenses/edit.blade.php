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
                            <div class="card-body" >
                                <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <label for="expense_type_id">Тип расходов:</label>
                                    <select name="expense_type_id" class="form-control" required>
                                        @foreach($expenseTypes as $expenseType)
                                            <option value="{{ $expenseType->id }}" {{ $expenseType->id == $expense->expense_type_id ? 'selected' : '' }}>
                                                {{ $expenseType->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label for="name">Название:</label>
                                    <input type="text" name="name" class="form-control" value="{{ $expense->name }}" required>
                                    <label for="date">Дата:</label>
                                    <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
                                    <label for="price">Сумма:</label>
                                    <input type="number" name="price" step="0.01" class="form-control" value="{{ $expense->price }}" required>

                                    <label for="comment">Комментарий:</label>
                                    <input type="text" name="comment" class="form-control" value="{{ $expense->comment }}" required>

                                    <br>
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

    <!-- /.content-wrapper -->
@endsection
