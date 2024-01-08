@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
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
        <div class="container-fluid" bis_skin_checked="1">

            <div class="row" bis_skin_checked="1">
                <div class="col-lg-3 col-6" bis_skin_checked="1">

                    <div class="small-box bg-info" bis_skin_checked="1">
                        <div class="inner" bis_skin_checked="1">
                            <h3>{{$reportData['clientsCount']}}</h3>
                            <p>Количество клиентов</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('client')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6" bis_skin_checked="1">

                    <div class="small-box bg-success" bis_skin_checked="1">
                        <div class="inner" bis_skin_checked="1">
                            <h3>{{$reportData['invoiceCount']}}</h3>
                            <p>Количество инвойсов</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6" bis_skin_checked="1">

                    <div class="small-box bg-warning" bis_skin_checked="1">
                        <div class="inner" bis_skin_checked="1">
                            <h3>44</h3>
                            <p>Количество клиентов</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6" bis_skin_checked="1">

                    <div class="small-box bg-danger" bis_skin_checked="1">
                        <div class="inner" bis_skin_checked="1">
                            <h3>65</h3>
                            <p>Количество должников</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
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
