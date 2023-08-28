@extends('layouts.app', ['pageSlug' => 'user_profile', 'page' => 'Profile', 'section' => ''])

@section('content')
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $user->name }}</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
                    </ul>
    </nav>
    @include('alerts.success')
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                {{-- <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                        <i data-acorn-icon="edit-square"></i>
                        <span>Edit</span>
                    </button>
                </div> --}}
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row">
            <!-- Left Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <!-- Biography Start -->
                <h2 class="small-title">Profile</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center flex-column mb-4">
                            <div class="d-flex align-items-center flex-column">
                                <div class="sw-13 position-relative mb-3">
                                    <img src="{{ asset('temp/img/profile/profile.jpg') }}" class="img-fluid rounded-xl" alt="thumb" />
                                </div>
                                <div class="h5 mb-0">{{ $user->name }}</div>
                                <div class="text-muted">
                                @foreach ($user->getRoleNames() as $role)
                                    {{ $role }}
                                @endforeach</div>
                                <div class="text-muted">
                                    <i data-acorn-icon="pin" class="me-1"></i>
                                    <span class="align-middle">Jos, PL, Nigeria</span>
                                </div>
                            </div>
                        </div>
                        <div class="nav flex-column" role="tablist">
                            <a class="nav-link active px-0 border-bottom border-separator-light" href="{{ route('profile') }}" role="tab">
                                <i data-acorn-icon="activity" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Overview</span>
                            </a>
                            <a class="nav-link px-0 border-bottom border-separator-light" href=""  data-bs-toggle="modal" data-bs-target="#editAdmin{{ $user->id }}" role="tab">
                                <i data-acorn-icon="lock-off" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Change Password</span>
                            </a>
                            @include('profile.change-password')
                            <a class="nav-link px-0 border-bottom border-separator-light" href="{{ route('inventory-product') }}" role="tab">
                                <i data-acorn-icon="office" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Products</span>
                            </a>
                            <a class="nav-link px-0 border-bottom border-separator-light" href="{{ route('transactions') }}" role="tab">
                                <i data-acorn-icon="heart" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Transaction</span>
                            </a>
                            <a class="nav-link px-0" href="{{ route('staffs') }}" role="tab">
                                <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Staff(Sales Managers)</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Biography End -->
            </div>
            <!-- Left Side End -->

            <!-- Right Side Start -->
            <div class="col-12 col-xl-8 col-xxl-9 mb-5 tab-content">
                <!-- Overview Tab Start -->
                <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
                    <!-- Stats Start -->
                    <h2 class="small-title">Stats</h2>
                    <div class="mb-5">
                        <div class="row g-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Products</span>
                                            <i data-acorn-icon="office" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">FOR SALE</div>
                                        <div class="cta-1 text-primary">{{ $productsCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <a href="{{ route('sales') }}" class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Sales</span>
                                            <i data-acorn-icon="check-square" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">ALL</div>
                                        <div class="cta-1 text-primary">{{ $salesCount }}</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Transactions</span>
                                            <i data-acorn-icon="file-empty" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">ALL</div>
                                        <div class="cta-1 text-primary">{{ $transactionsCount }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card hover-border-primary">
                                    <div class="card-body">
                                        <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                            <span>Staffs</span>
                                            <i data-acorn-icon="screen" class="text-primary"></i>
                                        </div>
                                        <div class="text-small text-muted mb-1">ACTIVE</div>
                                        <div class="cta-1 text-primary">{{ $userCount }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Stats End -->

                    <!-- Activity Start -->
                    <h2 class="small-title">Transactions</h2>
                    <div class="card mb-5">
                        <div class="card-body">
                            <table class="table">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Type</th>
            <th scope="col">Title</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Amount</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
            <tr>
              <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
              <td>
                <a
                  href="{{ route('transactions.type', ['type' => $transaction->type]) }}">{{ $transaction->type }}</a>
              </td>
              <td style="max-width:150px">{{ $transaction->title }}</td>
              <td><a href="{{ route('method-view', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
              <td>₦{{ __($transaction->amount) }}</td>
              
            </tr>
          @endforeach
        </tbody>
      </table>
                        </div>
                    </div>
                    <!-- Activity End -->


                    
                </div>
                <!-- Overview Tab End -->



            </div>
            <!-- Right Side End -->
        </div>
@endsection