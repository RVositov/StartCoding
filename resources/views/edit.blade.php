@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Event</li>
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
                            <h3 class="card-title p-3">Edit School Event - This event will be changed after you submit</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Event name:</label>
                                    <input type="text" name="title" class="form-control" 
                                    placeholder="Enter event name" value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label>Date and time:</label>
                                    <div class="input-group">
                                        <input type="datetime-local" name="date" class="form-control" value="{{ $post->date }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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