@extends('layouts.app', ['pageSlug' => 'client_index', 'page' => 'Clients ', 'section' => ''])

@section('content')
<div class="page-title-container">
    <div class="row">
        <div class="col-12 col-sm-6">
            <h1 class="mb-0 pb-0 display-4">Customers</h1>
        </div>
        <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                    <!-- Tour Button Start -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#clientRegister">Register Customer</button>
            <!-- Tour Button End -->
        </div>
    </div>
</div>
<div class="card mb-5">
    <div class="card-body">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Balance</th>
                <th scope="col">Purchases</th>
                <th scope="col">Total Payment</th>
                <th scope="col">Last Purchase</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @foreach ($clients as $item)
            <tr>
                <td>{{ $item->name }} | {{ $item->document_type }}-{{ $item->document_id }}</td>
                <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                <td>{{ $item->phone }}</td>
                <td>@if (round($item->balance) > 0)
                                                <span class="text-success">{{ __($item->balance) }}</span>
                                            @elseif (round($item->balance) < 0.00)
                                                <span class="text-danger">{{ __($item->balance) }}</span>
                                            @else
                                                {{ __($item->balance) }}
                                            @endif</td>
                <td>{{ $item->sales->count() }}</td>
                <td>{{ __($item->transactions->sum('amount')) }}</td>
                <td>{{ ($item->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($item->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td>
                <td>
                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('clientShow', $item->id) }}" type="button" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-glasses undefined"><circle cx="5.5" cy="6.5" r="3.5"></circle><circle cx="14.5" cy="6.5" r="3.5"></circle><path d="M11 6 9 6M2 6 2.89031 14.9031C2.95859 15.586 3.37218 16.1861 3.98596 16.493L5 17M18 6 17.1097 14.9031C17.0414 15.586 16.6278 16.1861 16.014 16.493L15 17"></path></svg>
                    <span class="d-none d-xxl-inline-block">More Details</span>

                </a>
                    <a href="#" class="btn btn-sm btn-icon btn-icon-start btn-outline-info ms-1" data-bs-toggle="modal" data-bs-target="#clientEdit" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-edit-square undefined"><path d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11"></path><path d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z"></path></svg>
                        <span class="d-none d-xxl-inline-block">Edit</span>
                    </a>
                    <button class="btn btn-sm btn-icon btn-icon-start btn-outline-danger ms-1" type="button" data-bs-toggle="modal" data-bs-target="#clientDelete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-bin undefined"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                        <span class="d-none d-xxl-inline-block">Delete</span>
                    </button>
                </div>
                </td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Create Client Modal --}}
<div class="modal modal-right large fade" id="clientRegister" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Title">
                    <label>Name</label>
                </div>
                <div class="mb-3">
                    <label for="method" class="form-label">Payment Method</label>
                    <select id="method" name="method" class="form-control form-select">
                        <option selected="">Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="amount" placeholder="Amount">
                    <label>Amount</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="reference" placeholder="Reference">
                    <label>Reference</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Income Modal --}}
<div class="modal modal-right large fade" id="clientEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{__('Name')}} Income</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Title">
                    <label>Name</label>
                </div>
                <div class="mb-3">
                    <label for="method" class="form-label">Payment Method</label>
                    <select id="method" name="method" class="form-control form-select">
                        <option selected="">Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="amount" placeholder="Amount">
                    <label>Amount</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="reference" placeholder="Reference">
                    <label>Reference</label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="clientDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelDefault">Delete {{ __('This Method') }} ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are You Sure You Want To Delete {{ __('Title') }} Method?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection

