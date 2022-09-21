@extends('layouts.app', ['pageSlug' => 'transactions_sales', 'page' => 'Transactions | Sales', 'section' => ''])

@section('content')
  <div class="page-title-container">
    <div class="row">
      <!-- Title Start -->
      <div class="col-12 col-md-7">
        <h1 class="mb-0 pb-0 display-4" id="title">Receipt Summary</h1>
      </div>
      <!-- Title End -->

      <!-- Top Buttons Start -->
      <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
        <!-- Add New Button Start -->
        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto ">
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
          <span>Delete Receipt</span>
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
              <th scope="col">Date</th>
              <th scope="col">Title</th>
              <th scope="col">Manager</th>
              <th scope="col">Supplier</th>
              <th scope="col">Products</th>
              <th scope="col">Stock</th>
              <th scope="col">Defective Stock</th>
              <th scope="col">Status</th>

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
              <td>20</td>
              <td>TO FINALIZE</td>
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
        <h1 class="mb-0 pb-0 display-4" id="title">Cart</h1>
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

  <div class="card mb-2 bg-transparent no-shadow d-none d-md-block sh-3">
    <div class="card-body pt-0 pb-0 h-100">
      <div class="row g-0 h-100 align-content-center">
        {{-- <div class="col-12 col-md-1 d-flex align-items-center mb-2 mb-md-0 text-muted text-small">ID</div> --}}
        <div
          class="col-12 col-md-1 d-flex align-items-center mb-2 mb-md-0 text-muted text-small">
          Category
        </div>
        <div
          class="col-6 col-md-2 d-flex align-items-center justify-content-end text-alternate text-medium justify-content-end text-muted text-small">
          Product
        </div>
        <div
          class="col-6 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-end text-muted text-small">
          Stock</div>
        <div
          class="col-6 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-end text-muted text-small">
          Defective Stock</div>
        <div
          class="col-6 col-md-2 d-flex align-items-center text-alternate text-medium justify-content-end text-muted text-small">
          Total Stock</div>
      </div>
    </div>
  </div>
  <div class="scroll-out">
    <div
      class="scroll-by-count os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"
      data-count="4" id="checkboxTable" style="height: 288px; margin-bottom: -8px;">
      <div class="os-resize-observer-host observed">
        <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
      </div>
      <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
        <div class="os-resize-observer"></div>
      </div>
      <div class="os-content-glue" style="margin: 0px -15px; width: 829px; height: 295px;"></div>
      <div class="os-padding">
        <div class="os-viewport os-viewport-native-scrollbars-invisible os-viewport-native-scrollbars-overlaid"
          style="overflow-y: scroll;">
          <div class="os-content" style="padding: 0px 15px; height: 100%; width: 100%;">
            <div class="card mb-2 sh-19 sh-md-8">
              <div class="card-body pt-0 pb-0 h-100">
                <div class="row g-0 h-100 align-content-center">
                  {{-- <div class="col-11 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0 order-1 order-md-1">
                        <div class="text-muted text-small d-md-none">ID</div>
                        <a href="#" class="text-truncate">1</a>
                    </div> --}}
                  <div
                    class="col-12 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0 order-1 order-md-1">
                    <div class="text-muted text-small d-md-none">Category</div>
                    <div class="text-alternate">Phones</div>
                  </div>
                  <div
                    class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 order-2 order-md-2">
                    <div class="text-muted text-small d-md-none">Product</div>
                    <div class="text-alternate">Samsung A12</div>
                  </div>
                  <div
                    class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 order-3 order-md-3">
                    <div class="text-muted text-small d-md-none">Stock</div>
                    <div class="text-alternate">100</div>
                  </div>
                  <div
                    class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 order-4 order-md-4">
                    <div class="text-muted text-small d-md-none">Defective Stock</div>
                    <div class="text-alternate"> 10</div>

                  </div>
                  <div
                    class="col-6 col-md-2 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 order-5 order-md-5">
                    <div class="text-muted text-small d-md-none">Total Stock</div>
                    <div class="text-alternate">
                      110
                    </div>
                  </div>
                  <div
                    class="col-1 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 order-6 order-md-last">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-md-end">
                      <button data-bs-toggle="modal" data-bs-target="#editProduct"
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
                      <button class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1" type="button">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track os-scrollbar-track-off">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden" style="height: calc(100% - 8px);">
            <div class="os-scrollbar-track os-scrollbar-track-off">
              <div class="os-scrollbar-handle" style="height: 81.8182%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
      </div>
    </div>
  </div>

  {{-- Add Products Modal Start --}}
  @include('inventory.receipts.modal.add-product')
  @include('inventory.receipts.modal.edit-product')
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
@endpush
