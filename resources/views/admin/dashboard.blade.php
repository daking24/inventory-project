@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total sales</h5>
                            <h2 class="card-title">Annual yield</h2>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end align-items-left">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-outline-primary btn-simple " id="0">
                                <input type="radio" name="options" class="d-none d-sm-none">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Products</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-outline-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchases</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-outline-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Clients</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Last Month Income</h5>
                    <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chart-up d-inline-block text-success"><path d="M18 18L4 18C2.89543 18 2 17.1046 2 16L2 2"></path><path d="M18 5L12.6464 10.2263C11.9734 10.8833 10.903 10.8957 10.2149 10.2545V10.2545C9.5268 9.61336 8.45638 9.62579 7.78337 10.2828L5 13"></path><path d="M14 5H18V9"></path></svg>  {{ $semesterincomes }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Monthly Balance</h5>
                    <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-balance d-inline-block text-warning"><path d="M6.87104 10.6611 4.77654 5.15663C4.69708 4.94779 4.30292 4.94779 4.22345 5.15663L2.12896 10.6611C2.0667 10.8247 2.18755 11 2.36261 11L6.63739 11C6.81245 11 6.9333 10.8247 6.87104 10.6611zM17.871 10.6611 15.7765 5.15663C15.6971 4.94779 15.3029 4.94779 15.2235 5.15663L13.129 10.6611C13.0667 10.8247 13.1876 11 13.3626 11L17.6374 11C17.8125 11 17.9333 10.8247 17.871 10.6611z"></path><path d="M2.5 11V11.5C2.5 12.6046 3.39543 13.5 4.5 13.5V13.5C5.60457 13.5 6.5 12.6046 6.5 11.5V11M13.5 11V11.5C13.5 12.6046 14.3954 13.5 15.5 13.5V13.5C16.6046 13.5 17.5 12.6046 17.5 11.5V11"></path><path d="M2 4H18M10 2 10 15"></path><path d="M8.5 18C8.03406 18 7.80109 18 7.61732 17.9239C7.37229 17.8224 7.17761 17.6277 7.07612 17.3827C7 17.1989 7 16.9659 7 16.5V16.5C7 16.0341 7 15.8011 7.07612 15.6173C7.17762 15.3723 7.37229 15.1776 7.61732 15.0761C7.80109 15 8.03406 15 8.5 15L11.5 15C11.9659 15 12.1989 15 12.3827 15.0761C12.6277 15.1776 12.8224 15.3723 12.9239 15.6173C13 15.8011 13 16.0341 13 16.5V16.5C13 16.9659 13 17.1989 12.9239 17.3827C12.8224 17.6277 12.6277 17.8224 12.3827 17.9239C12.1989 18 11.9659 18 11.5 18L8.5 18Z"></path></svg> {{ $monthlybalance }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Expenditures Last Month</h5>
                    <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chart-down d-inline-block text-danger"><path d="M18 18L4 18C2.89543 18 2 17.1046 2 16L2 2"></path><path d="M5 13L10.3536 7.7737C11.0266 7.11669 12.097 7.10426 12.7851 7.74545V7.74545C13.4732 8.38664 14.5436 8.37421 15.2166 7.7172L18 5"></path><path d="M9 13H5V9"></path></svg>  {{ $semesterexpenses }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('temp/js/demo.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<script src="{{ asset('temp/js/chartjs.min.js') }}"></script>
  <script>
var lastmonths = [];

        @foreach ($lastmonths as $id => $month)
            lastmonths.push('{{ strtoupper($month) }}')
        @endforeach
        var lastincomes = {{ $lastincomes }};

        var lastexpenses = {{ $lastexpenses }};
        var anualsales = {{ $anualsales }};
        var anualclients = {{ $anualclients }};
        var anualproducts = {{ $anualproducts }};
        var methods = [];
        var methods_stats = [];

        @foreach($monthlybalancebymethod as $method => $balance)
            methods.push('{{ $method }}');
            methods_stats.push('{{ $balance }}');
        @endforeach
        console.log(anualclients, anualproducts, anualsales)
        $(document).ready(function() {
            demo.initDashboardPageCharts(lastmonths, methods, methods_stats, lastincomes, lastexpenses, anualproducts, anualsales, anualclients);
        });
  </script>
@endpush
