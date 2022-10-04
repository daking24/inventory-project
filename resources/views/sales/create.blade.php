@extends('layouts.app', ['pageSlug' => 'transactions_sales', 'page' => 'Transactions | Sales', 'section' => ''])

@section('content')
  @include('alerts.success')
  @include('alerts.error')
  <div class="page-title-container">
    <div class="row">
      <!-- Title Start -->
      <div class="col-12 col-md-7">
        <h1 class="mb-0 pb-0 display-4" id="title">Sale Summary</h1>
      </div>
      <!-- Title End -->
      @if (!$sale->finalized_at)
        <!-- Top Buttons Start -->
        <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
          <!-- Add New Button Start -->
          @if ($sale->products->count() == 0)
            <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto "
              data-bs-toggle="modal" data-bs-target="#deleteSale{{  $sale->id }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="acorn-icons acorn-icons-bin undefined">
                <path
                  d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5">
                </path>
                <path
                  d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5">
                </path>
                <path d="M2 5H18M12 9V13M8 9V13"></path>
              </svg>
              <span>Delete Sale</span>
            </button>
            <!-- Add New Button End -->
          @else
            <a href="{{ route('sales.finalize', $sale->id) }}" type="button"
              class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto ">
              <i data-acorn-icon="arrow-end-right" class="icon" data-acorn-size="18"></i>

              <span>Finalize Sale</span>
            </a>
          @endif
        </div>
        <!-- Top Buttons End -->
      @endif
    </div>
  </div>
  <div class="col-12 mb-5">
    <div class="card mb-5">
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Date</th>
              <th scope="col">Handler</th>
              <th scope="col">Customer</th>
              <th scope="col">Products</th>
              <th scope="col">Total Stock</th>
              <th scope="col">Total Cost</th>
              <th scope="col">Status</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{ $sale->id }}</th>
              <td>{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
              <td>{{ $sale->user->name }}</td>
              <td><a href="{{ route('clientShow', $sale->client) }}">{{ $sale->client->name }} |
                  {{ $sale->client->document_type }}-{{ $sale->client->document_id }}</a></td>
              <td>{{ $sale->products->count() }}</td>
              <td>{{ $sale->products->sum('quantity') }}</td>
              <td>{{ __($sale->products->sum('total_amount')) }}</td>
              <td class="text-warning">{!! $sale->finalized_at
                  ? 'Completed at<br>' . date('d-m-y', strtotime($sale->finalized_at))
                  : ($sale->products->count() > 0
                      ? 'TO FINALIZE'
                      : 'ON HOLD') !!}</td>
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
        <h1 class="mb-0 pb-0 display-4" id="title">Cart: {{ $sale->products->sum('quantity') }}</h1>
      </div>
      <!-- Title End -->

      <!-- Top Buttons Start -->
      <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
        <!-- Add New Button Start -->
        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable"
          data-bs-toggle="modal" data-bs-target="#addProduct">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
            class="acorn-icons acorn-icons-plus undefined">
            <path d="M10 17 10 3M3 10 17 10"></path>
          </svg>
          <span>Add New</span>
        </button>
        <!-- Add New Button End -->
      </div>
      <!-- Top Buttons End -->
    </div>
  </div>

  <div class="col-12 mb-5">
    <div class="card mb-5">
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price C/U</th>
              <th scope="col">Total</th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            @forelse ($sale->products as $sold_product)
              <tr>
                <th scope="row">{{ $sold_product->product->id }}</th>
                <td><a
                    href="{{ route('category-view', $sold_product->product->category) }}">{{ $sold_product->product->category->name }}</a>
                </td>
                <td><a href="{{ route('product-view', $sold_product->product) }}">{{ $sold_product->product->name }}</a>
                </td>
                <td>{{ $sold_product->quantity }}</td>
                <td>₦{{ __($sold_product->unit_price) }}</td>
                <td>₦{{ __($sold_product->total_amount) }}</td>
                <td>
                  <div class="d-flex align-items-center justify-content-end">
                    <button data-bs-toggle="modal" data-bs-target="#editProduct{{ $sold_product->id }}"
                      class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="acorn-icons acorn-icons-edit-square undefined">
                        <path
                          d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11">
                        </path>
                        <path
                          d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z">
                        </path>
                      </svg>
                      <span class="d-none d-xxl-inline-block">Edit</span>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $sold_product->id }}"
                      class="btn btn-sm btn-icon btn-icon-start btn-outline-danger ms-1" type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="acorn-icons acorn-icons-bin undefined">
                        <path
                          d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5">
                        </path>
                        <path
                          d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5">
                        </path>
                        <path d="M2 5H18M12 9V13M8 9V13"></path>
                      </svg>
                      <span class="d-none d-xxl-inline-block">Delete</span>
                    </button>
                    @include('sales.modal.delete-product')
                    @include('sales.modal.edit-product')
                  </div>
                </td>
              </tr>


            @empty
              <tr>
                <th scope="row" colspan="7" class="text-center">
                  <span class="text-warning">
                    {{ __('There is no data.') }}
                  </span>
                </th>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Add Products Modal Start --}}
  @include('sales.modal.add-product')
  @include('sales.modal.delete-sale')
  {{-- Add Products Modal End --}}
@endsection

@push('js')
  <!-- Page Specific Scripts Start -->
  {{-- <script src="{{ asset('temp/js') }}/cs/datatable.extend.js"></script> --}}
  <script src="{{ asset('temp/js/cs/checkall.js') }}"></script>
  <script src="{{ asset('temp/js/pages/blocks.tabulardata.js') }}"></script>
  <script src="{{ asset('temp/js/plugins/datatable.editablerows.js') }}"></script>
  <script src="{{ asset('temp/js') }}/common.js"></script>
  <script src="{{ asset('temp/js') }}/scripts.js"></script>
  <!-- Page Specific Scripts End -->
  <script>
    let productId = document.getElementById("product")
    let opt = productId.options[productId.selectedIndex].value()
    console.log(opt);
  </script>
@endpush('js')
