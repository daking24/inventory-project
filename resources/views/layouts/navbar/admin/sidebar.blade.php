<div id="nav" class="nav-container d-flex"     >
        <div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="{{ route('admin-dashboard') }}">
            <!-- Logo can be added directly -->

             <img src="{{ asset('white1-0.svg') }}" alt="logo" />
            {{-- <div class="img"></div> --}}
        </a>
    </div>
    <!-- Logo End -->


    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="profile" src="{{asset('temp')}}/img/profile/profile.jpg" />
            <div class="name">{{ $user->name }} - {{ $role }}
        </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('profile') }}">
                                <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    <!-- User Menu End -->


    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
       <ul id="menu" class="menu">
        <li>
                <a href="{{ route('admin-dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-home icon"><path d="M4 10V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V10"></path><path d="M12 18V13.875C12 13.5239 12 13.3483 11.9157 13.2222C11.8793 13.1676 11.8324 13.1207 11.7778 13.0843C11.6517 13 11.4761 13 11.125 13H8.875C8.52388 13 8.34833 13 8.22221 13.0843C8.16762 13.1207 8.12074 13.1676 8.08427 13.2222C8 13.3483 8 13.5239 8 13.875V18"></path><path d="M2 9.5L3.30715 4.59818C3.59125 3.53283 3.73329 3.00016 4.07581 2.63391C4.22529 2.47406 4.4 2.33984 4.59297 2.23658C5.03511 2 5.5864 2 6.68897 2H13.311C14.4136 2 14.9649 2 15.407 2.23658C15.6 2.33984 15.7747 2.47406 15.9242 2.63391C16.2667 3.00016 16.4088 3.53283 16.6928 4.59818L18 9.5"></path><path d="M2 9.5H5.39023C6.0676 9.5 6.40629 9.5 6.71555 9.39638C6.85193 9.35068 6.98299 9.2904 7.10644 9.21659C7.38638 9.04922 7.6068 8.79207 8.04763 8.27777L9.33565 6.77507C9.59815 6.46882 9.7294 6.3157 9.89306 6.27987C9.96352 6.26444 10.0365 6.26444 10.1069 6.27987C10.2706 6.3157 10.4018 6.46882 10.6643 6.77507L11.9524 8.27777C12.3932 8.79207 12.6136 9.04922 12.8936 9.21659C13.017 9.2904 13.1481 9.35068 13.2844 9.39638C13.5937 9.5 13.9324 9.5 14.6098 9.5H18"></path></svg>
                    <span class="label">Dashboard</span>
                </a>

            </li>
            <li>
                <a href="#transactions" data-href="/Transactions">
                    <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                    <span class="label">Transactions</span>
                </a>
                <ul id="transactions">
                    <li>
                        <a href="{{route('transaction-stats')}}">
                            <span class="label">Statistics</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('transactions')}}">
                            <span class="label">All</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('transfer')}}">
                            <span class="label">Transfers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('sales')}}">
                            <span class="label">Sales</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('transactions.type', 'payment')}}">
                            <span class="label">Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('transactions.type', 'income')}}">
                            <span class="label">Income</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('transactions.type', 'expense')}}">
                            <span class="label">Expense</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#inventory" data-href="/Inventory">
                    <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                    <span class="label">Inventory</span>
                </a>
                <ul id="inventory">
                    <li>
                        <a href="{{route('inventory-stats')}}">
                            <span class="label">Statistics</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('inventory-product')}}">
                            <span class="label">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('inventory-category')}}">
                            <span class="label">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('inventory-receipt')}}">
                            <span class="label">Receipts</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('clients') }}">
                    <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                    <span class="label">Customers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supplier') }}">
                    {{-- <i data-acorn-icon="delivery-truck" class="icon" data-acorn-size="18"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-shipping icon"><path d="M2 2H3.33333C4.38252 2 5.37049 2.49398 6 3.33333V3.33333C6.32456 3.76607 6.5 4.29241 6.5 4.83333V11.5C6.5 12.6046 7.39543 13.5 8.5 13.5H17"></path><path d="M15.25 4C15.9522 4 16.3033 4 16.5556 4.16853C16.6648 4.24149 16.7585 4.33524 16.8315 4.44443C17 4.69665 17 5.04777 17 5.75L17 9.25C17 9.95223 17 10.3033 16.8315 10.5556C16.7585 10.6648 16.6648 10.7585 16.5556 10.8315C16.3033 11 15.9522 11 15.25 11L10.75 11C10.0478 11 9.69665 11 9.44443 10.8315C9.33524 10.7585 9.24149 10.6648 9.16853 10.5556C9 10.3033 9 9.95223 9 9.25L9 5.75C9 5.04777 9 4.69665 9.16853 4.44443C9.24149 4.33524 9.33524 4.24149 9.44443 4.16853C9.69665 4 10.0478 4 10.75 4L15.25 4Z"></path><path d="M13 4V7"></path><path d="M7 15.5C7 14.6716 7.67158 14 8.5 14V14C9.32843 14 10 14.6716 10 15.5V15.5C10 16.3284 9.32842 17 8.5 17V17C7.67157 17 7 16.3284 7 15.5V15.5zM13 15.5C13 14.6716 13.6716 14 14.5 14V14C15.3284 14 16 14.6716 16 15.5V15.5C16 16.3284 15.3284 17 14.5 17V17C13.6716 17 13 16.3284 13 15.5V15.5z"></path></svg>
                    <span class="label">Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ route('payment-methods') }}">
                    {{-- <i data-acorn-icon="delivery-truck" class="icon" data-acorn-size="18"></i> --}}
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-shipping icon"><path d="M2 2H3.33333C4.38252 2 5.37049 2.49398 6 3.33333V3.33333C6.32456 3.76607 6.5 4.29241 6.5 4.83333V11.5C6.5 12.6046 7.39543 13.5 8.5 13.5H17"></path><path d="M15.25 4C15.9522 4 16.3033 4 16.5556 4.16853C16.6648 4.24149 16.7585 4.33524 16.8315 4.44443C17 4.69665 17 5.04777 17 5.75L17 9.25C17 9.95223 17 10.3033 16.8315 10.5556C16.7585 10.6648 16.6648 10.7585 16.5556 10.8315C16.3033 11 15.9522 11 15.25 11L10.75 11C10.0478 11 9.69665 11 9.44443 10.8315C9.33524 10.7585 9.24149 10.6648 9.16853 10.5556C9 10.3033 9 9.95223 9 9.25L9 5.75C9 5.04777 9 4.69665 9.16853 4.44443C9.24149 4.33524 9.33524 4.24149 9.44443 4.16853C9.69665 4 10.0478 4 10.75 4L15.25 4Z"></path><path d="M13 4V7"></path><path d="M7 15.5C7 14.6716 7.67158 14 8.5 14V14C9.32843 14 10 14.6716 10 15.5V15.5C10 16.3284 9.32842 17 8.5 17V17C7.67157 17 7 16.3284 7 15.5V15.5zM13 15.5C13 14.6716 13.6716 14 14.5 14V14C15.3284 14 16 14.6716 16 15.5V15.5C16 16.3284 15.3284 17 14.5 17V17C13.6716 17 13 16.3284 13 15.5V15.5z"></path></svg> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-money icon"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 11.5C18 12.9045 18 13.6067 17.6629 14.1111C17.517 14.3295 17.3295 14.517 17.1111 14.6629C16.6067 15 15.9045 15 14.5 15L5.5 15C4.09554 15 3.39331 15 2.88886 14.6629C2.67048 14.517 2.48298 14.3295 2.33706 14.1111C2 13.6067 2 12.9045 2 11.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M6 5V5C6 6.65685 4.65685 8 3 8H2M18 8 17 8C15.3431 8 14 6.65685 14 5V5M14 15V15C14 13.3431 15.3431 12 17 12L18 12M2 12 3 12C4.65685 12 6 13.3431 6 15V15"></path><path d="M7 10H13"></path></svg>
                    <span class="label">Payment Methods</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Scrollspy Mobile Button Start -->
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-acorn-icon="menu-dropdown"></i>
        </a>
        <!-- Scrollspy Mobile Button End -->

        <!-- Scrollspy Mobile Dropdown Start -->
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <!-- Scrollspy Mobile Dropdown End -->

        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
    </div>
