@extends('layouts.app', ['pageSlug' => 'inventory_category_view', 'page' => 'Inventory | Category | View', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Category Information</h1>
        </div>
        <!-- Title End -->

    </div>
</div>

<div class="col-12 mb-5">
    <div class="card mb-5">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Products</th>
                    <th scope="col">Stocks</th>
                    <th scope="col">Defective Stocks</th>
                    <th scope="col">Average Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>22 Sept 2022</td>
                    <td><a href="#">Income</a></td>
                    <td>Some payments</td>
                    <td>210.66</td>
                    <td>dasdda</td>
                    <td>
                        naira something
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Products: 1</h1>
        </div>
        <!-- Title End -->
    </div>
</div>
<div class="col-12 mb-5">
    <div class="card mb-5">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Defective Stock</th>
                    <th scope="col">Base Price</th>
                    <th scope="col">Average Price</th>
                    <th scope="col">Total Sales</th>
                    <th scope="col">Income Produced</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>22 Sept 2022</td>
                    <td>Phone Supply</td>
                    <td>Sales Manager</td>
                    <td>Samsung</td>
                    <td>50</td>
                    <td>2000</td>
                    <td><div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('product-view') }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                        <span class="d-none d-xxl-inline-block">View</span>
                    </a>

                </div></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
