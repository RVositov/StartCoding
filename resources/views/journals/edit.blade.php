@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-default-info">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Электронный журнал</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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


                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Информация о группах</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item">
                                        <a class="btn bg-gradient-info" href="{{ route('groups.create') }}">
                                            <i class="fa-solid fa-calendar-plus"></i>&nbsp; Добавить группу
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <form action="{{route('journal.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="groupId" value="{{$groupId}}">
                                <table id="example1" class="table table-bordered table-striped"   >
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                         <th class="col-2" >ФИО</th>
                                         @foreach($lessonDates as $date)
                                            <th >{{$date['day']}}</th>
                                        @endforeach

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="col-2">{{$student->surname}} {{$student->name}}</td>
                                            @foreach($lessonDates as $date)
                                                <td>
                                                    <select class="form-control" style="padding:0" name="marks[{{$student->id}}][{{$date['date']}}]">
                                                        <option
                                                            value=""></option>
                                                        @foreach($marks as $mark)
                                                            <option value="{{$mark->id}}" {{ $mark->id == app('App\Http\Controllers\JournalController')->getMark($groupId, $student->id, $date['date']) ? 'selected' : '' }}>{{$mark->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                                    <input type="submit" class="form-control btn-outline-primary" value="Сохранить">
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

    <div id="openModal">
        <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
