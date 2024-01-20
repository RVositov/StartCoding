
@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование оплаты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Payment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Редактировать оплату</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('incomes.update', $income->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')



                                    <div class="form-group">
                                        <label for="student_id" >Student:</label>
                                        <select name="student_id" required class="form-control">
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}" @if($student->id == $income->student_id) selected @endif>{{ $student->name }}  {{ $student->surname }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">TJS</span>
                                        </div>
                                        <input type="text" class="form-control" name="price" value="{{ $income->price }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>


                                    <label for="date">Date:</label>
                                    <input type="date" name="date" value="{{ $income->date }}" class="form-control"  required>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Обновить оплату</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
