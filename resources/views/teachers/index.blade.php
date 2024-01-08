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
                    <h1>Клиенты</h1>
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
                            <h3 class="card-title p-3">Информация о клиентах</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="btn bg-gradient-info" href="{{ route('teachers.create') }}">
                                        <i class="fa-solid fa-calendar-plus"></i>&nbsp; Добавить учителья
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">№</th>
                                        <th  >Name</th>
                                        <th>Surname</th>
                                        <th>Phone</th>
                                        <th>Birthday</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->surname }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->birthday }}</td>
                                        <td>
                                            @if($teacher->image)
                                                <img src="{{ asset('storage/'.$teacher->image) }}" alt="Teacher Image" class="img-thumbnail" style="max-width: 50px; max-height: 50px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm">Show</a>
                                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
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
