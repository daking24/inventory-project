@extends('layouts.app', ['pageSlug' => 'inventory_receipts', 'page' => 'Inventory | Receipts', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <div class="col-12 col-sm-6">
            <h1 class="mb-0 pb-0 display-4">Receipts</h1>
        </div>
        <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                    <!-- Tour Button Start -->
            <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createReceipt">New Receipt</a>
            {{-- <a href="{{ route('client-create') }}" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#expensesRegister">Register Sale</a> --}}
            <!-- Tour Button End -->
        </div>
    </div>
</div>
<div class="card mb-5">
    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Title</th>
                <th scope="col">Supplier</th>
                <th scope="col">Products</th>
                <th scope="col">Stock</th>
                <th scope="col">Defective Stock</th>
                <th scope="col">Status</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">22 Sept 2022</th>
                <td>Phone Supply</td>
                <td>Samsung</td>
                <td>200</td>
                <td>1000</td>
                <td>10</td>
                <td>FINALIZED</td>
                <td>
                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('receipt-view') }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses mb-3 d-inline-block text-primary"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                        <span class="d-none d-xxl-inline-block">View</span>
                    </a>
                    <button class="btn btn-sm btn-icon btn-icon-start btn-outline-danger ms-1" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-bin undefined"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                        <span class="d-none d-xxl-inline-block">Delete</span>
                    </button>
                </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Create Client Modal --}}
@include('inventory.receipts.modal.create')
@endsection

