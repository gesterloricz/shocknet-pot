<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Printing Order Tracker')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #050A30;
        }

        .navbar-custom {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .nav-btn {
            margin-right: 10px;
            border-radius: 8px;
            padding: 8px 20px;
            text-decoration: none;
            border: none;
        }

        .nav-btn.active {
            background-color: #ED1C24;
            color: white;
        }

        .nav-btn:not(.active) {
            background-color: transparent;
            color: #050A30;
            border: 1px solid #050A30;
        }

        .nav-btn:hover:not(.active) {
            background-color: #050A30;
            color: #ffffff;
        }

        .main-content {
            padding: 30px 0;
            background-color: #f8f9fa;
            min-height: calc(100vh - 76px);
        }

        .logout-btn {
            background-color: transparent;
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        .logout-btn:hover {
            background-color: #dc3545;
            color: white;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">

            <div class="d-flex align-items-center justify-content-between w-100">
                <a href="#" class="navbar-brand">
                    Shocknet
                </a>

                <div class="d-flex align-items-center justify-content-end w-100">
                    <a href="{{ route('orders.index') }}"
                        class="nav-btn {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                        Orders
                    </a>
                    <a href="{{ route('clients.index') }}"
                        class="nav-btn {{ request()->routeIs('clients.*') ? 'active' : '' }}">
                        Clients
                    </a>
                    <a href="{{ route('reports.index') }}"
                        class="nav-btn {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                        Reports
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-btn logout-btn">Logout</button>
                    </form>
                </div>
            </div>
    </nav>

    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>