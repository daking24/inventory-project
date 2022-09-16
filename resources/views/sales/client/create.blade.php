@extends('layouts.app', ['pageSlug' => 'sales_client', 'page' => 'Sales | Client', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <div class="col-12 col-sm-6">
            <h1 class="mb-0 pb-0 display-4">Select/Create Client</h1>
        </div>
    </div>
</div>

<div class="card mb-5">
    <div class="card-body">
        <form method="POST" action="" >
            <div class="form-floating mb-3">
                <label for="client-name" class="form-label">Select Customer</label>
                <select id="client-name" name="client_name" class="form-select">
                    <option selected="">Choose...</option>
                    <option value="">Joe</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        <form method="POST" action="" >
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="client_name" placeholder="Customer's Name">
                <label>Customer's Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="client_phone" placeholder="Phone Number">
                <label>Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="client_email" placeholder="email" >
                <label>Email (Optional)</label>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection