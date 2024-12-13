<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #297bce;
            color: white;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar h4 {
            margin-bottom: 30px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            color: #0dcaf0;
        }

        .sidebar-collapsed {
            background-color: #297bce;
            color: white;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar-collapsed a {
            color: white;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar Full -->
        <nav class="sidebar d-none d-md-block">
            <h4 class="fw-bold">Admin Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link text-white fw-bold" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white fw-bold" href="{{ route('admin.userReport') }}">
                        <i class="fas fa-chart-line"></i> User Report
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white fw-bold" href="{{ route('admin.allUsers') }}">
                        <i class="fas fa-users"></i> All Users
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white fw-bold" href="{{ route('admin.NewUsers') }}">
                        <i class="fas fa-users"></i> Add New Users
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-white fw-bold">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li> --}}
            </ul>
        </nav>

        <!-- Sidebar Collapsed -->
        <nav class="sidebar-collapsed d-md-none">
            <a href="{{ route('admin.dashboard') }}" title="Dashboard"><i class="fas fa-tachometer-alt fa-2x"></i></a>
            <a href="{{ route('admin.userReport') }}" title="User Report"><i class="fas fa-chart-line fa-2x"></i></a>
            <a href="{{ route('admin.allUsers') }}" title="All Users"><i class="fas fa-users fa-2x"></i></a>
            <a href="{{ route('admin.NewUsers') }}" title="ADD Users"><i class="fas fa-users fa-2x"></i></a>
        </nav>

        <!-- Main Content -->
        <div class="p-4 w-100">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
