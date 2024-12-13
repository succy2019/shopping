@extends('admin.layout')

@section('content')
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h1 class="animate__animated animate__fadeInDown">Welcome Back!</h1>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center animate__animated animate__fadeInUp">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users fa-2x text-primary"></i></h5>
                            <p class="card-text">Total Users</p>
                            <h3>{{ $data['totalUsers'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-dollar-sign fa-2x text-success"></i></h5>
                            <p class="card-text">Total Sales</p>
                            <h3>${{ $data['totalSales'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-tasks fa-2x text-warning"></i></h5>
                            <p class="card-text">Pending Tasks</p>
                            <h3>35</h3> <!-- Example static data -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @endsection
