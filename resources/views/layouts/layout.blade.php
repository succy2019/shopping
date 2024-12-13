<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5;
            color: #333;
        }

        /* Header/Menu */
        header {
            background-color: #20232a;
            color: white;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .search-bar {
            display: flex;
            flex: 1;
            margin: 0 20px;
        }
        .search-bar input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            font-size: 1rem;
        }
        .search-bar button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        .search-bar button:hover {
            background-color: #0056b3;
        }
        .menu {
            display: flex;
            list-style: none;
            gap: 20px;
            margin-left: auto;
        }
        .menu a {
            font-size: 1rem;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
        }
        .menu a:hover {
            color: #007bff;
        }
        .cart-icon {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        .cart-icon img {
            width: 24px;
        }
        .cart-count {
            background-color: red;
            color: white;
            font-size: 0.8rem;
            border-radius: 50%;
            padding: 2px 8px;
            position: relative;
            top: -10px;
        }
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }
        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
            transition: 0.4s;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .menu {
                display: none;
                flex-direction: column;
                position: absolute;
                background-color: #20232a;
                top: 60px;
                right: 0;
                width: 100%;
                padding: 10px 0;
                transition: max-height 0.3s ease-in-out;
                overflow: hidden;
            }
            .menu.active {
                display: flex;
            }
            .hamburger {
                display: flex;
            }
            .menu a {
                padding: 10px 20px;
                text-align: center;
            }
        }

        /* Hero Slider */
        .hero {
            margin-top: 70px;
            position: relative;
            overflow: hidden;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 100%;
        }
        .slides img {
            width: 100%;
            height: 60vh;
            object-fit: cover;
        }
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px 30px;
            border-radius: 8px;
        }
        .hero-content h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .hero-content button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .slider-control {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            margin: 0 10px;
        }

        /* Categories Section */
        .categories-section {
            padding: 60px 20px;
            text-align: center;
        }
        .categories-section h1 {
            margin-bottom: 20px;
        }
        .categories-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .category-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .category-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .category-card h3 {
            font-size: 1.2rem;
        }

        /* Products Section */
        .product-section {
            padding: 60px 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .product-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
            text-align: center;
        }
        .product-info h2 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .product-info p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }
        .add-to-cart {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .add-to-cart:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            background-color: #20232a;
            color: white;
            padding: 20px;
            text-align: center;
        }
        footer a {
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
		<div class="hamburger" id="hamburger">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
    @if (Route::has('login'))
    <ul class="menu" id="menu">
        @auth
        <div>Hello,{{ Auth::user()->name }}</div>
          
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('profile.edit') }}">Profile</a></li>
            <li><a href="{{ route('checkout.view') }}">Cart</a></li>
            <li>
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
            </li>
              
        @else
        <li><a href="#">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">register</a></li>
          
           
        @endauth
    </ul>
@endif
        <div class="navbar">
            <div class="logo">Clothing Store</div>
            <div class="search-bar">
                <input type="text" placeholder="Search for products...">
                <button>Search</button>
            </div>
            <div class="cart-icon">
                <img src="https://via.placeholder.com/24x24?text=C" alt="Cart">
                <span class="cart-count">3</span>
            </div>
    </header>

@yield('content')






	 <!-- Footer -->
	 <footer>
        <p>&copy; <?php echo date('Y')?>Clothing Store. All rights reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
    </footer>

    <script>
        // JavaScript for responsive menu
        const menu = document.getElementById('menu');
        const hamburger = document.getElementById('hamburger');

        hamburger.addEventListener('click', () => {
            menu.classList.toggle('active');
        });

        // JavaScript for image slider
        const slides = document.getElementById('slides');
        const images = slides.getElementsByTagName('img');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');

        let currentIndex = 0;

        function showSlide(index) {
            if (index >= images.length) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = images.length - 1;
            }
            slides.style.transform = 'translateX(' + (-currentIndex * 100) + '%)';
        }

        nextButton.addEventListener('click', () => {
            currentIndex++;
            showSlide(currentIndex);
        });

        prevButton.addEventListener('click', () => {
            currentIndex--;
            showSlide(currentIndex);
        });

        // Auto slide every 5 seconds
        setInterval(() => {
            currentIndex++;
            showSlide(currentIndex);
        }, 5000);
    </script>
</body>
</html>
