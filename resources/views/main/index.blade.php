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
                            <h3>{{ $studentsCount }} </h3>
                            <p>Количество студентов</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/students" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6" bis_skin_checked="1">

                    <div class="small-box bg-success" bis_skin_checked="1">
                        <div class="inner" bis_skin_checked="1">
                            <h3>{{ $teachersCount }}</h3>
                            <p>Количество учителей</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/teachers" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6" bis_skin_checked="1">

                    <div class="small-box bg-warning" bis_skin_checked="1">
                        <div class="inner" bis_skin_checked="1">
                            <h3>{{ $incomesSum }}STJ</h3>
                            <p>Доход</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/incomes" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6" bis_skin_checked="1">

                    <div class="small-box bg-danger" bis_skin_checked="1">
                        <div class="inner" bis_skin_checked="1">
                            <h3>{{ $expensesSum }}STJ</h3>
                            <p>Расход</p>
                        </div>
                        <div class="icon" bis_skin_checked="1">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="/expenses" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            </div>
        </section>

    <div class="row col-sm-12">
    <!--  Список доходов -->
        <div class="col-sm-6">
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Доход на {{ $currentMonth }} </h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($userTotalIncomes as $item)
                    <tr>
                        <td>
                            <img src="/public/dist/img/favicon.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            {{ $item['user_name'] }}
                        </td>
                        <td>{{ $item['total_income'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Доход на текуший год  </h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Месяц</th>
                                <th>Сумма</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($monthlyTotalIncomes as $monthlyIncome)
                            <tr>
                                <td>{{ \Carbon\Carbon::create()->month($monthlyIncome->month)->format('F') }}</td>
                                <td>{{ $monthlyIncome->total }}с</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
<!-- /.content-wrapper -->
</div>
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
