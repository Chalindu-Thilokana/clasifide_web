<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Category Navbar</title>
  <script src="https://cdn.tailwindcss.com"></script>

  @livewireStyles
</head>
<body class="bg-gray-100">
  @yield('content')


  <!-- Navbar -->
  <nav class="bg-white shadow-lg p-4">
    <div class="container mx-auto flex items-center justify-between">
      <!-- Logo -->
       <!-- Add your logo here -->

      <div class="text-gray-800 text-xl font-bold hover:text-blue-600">
        <img src="{{ asset('assets/logo.png') }}" class="h-15 w-12 mr-2 " >
        <a href="#">Lanka add.lk</a>
        
      </div>

      <!-- Categories Dropdown -->
    

      <!-- Nav Links -->
      <div class="hidden md:flex items-center space-x-6">
        <a href="{{route('index_web')}}" class="text-gray-800 hover:text-blue-600 active:text-blue-800 focus:text-blue-800 underline-offset-4 hover:underline">Home</a>
        <a href="{{route('addvertesmen')}}" class="text-gray-800 hover:text-blue-600 active:text-blue-800 focus:text-blue-800 underline-offset-4 hover:underline">Listings</a>
        <a href="#" class="text-gray-800 hover:text-blue-600 active:text-blue-800 focus:text-blue-800 underline-offset-4 hover:underline">About</a>
        <a href="#" class="text-gray-800 hover:text-blue-600 active:text-blue-800 focus:text-blue-800 underline-offset-4 hover:underline">Contact</a>
        
        @if (Route::has('login'))
          @auth
            <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600">
              Dashboard
            </a>
          @else
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600">
              Login
            </a>
          @endauth
        @endif
      </div>
      
      <!-- Search Bar -->
     

      <!-- Mobile Menu Button -->
      <div class="md:hidden flex items-center">
        <button class="text-gray-800 focus:outline-none" id="mobileMenuButton">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div class="hidden md:hidden bg-white p-4" id="mobileMenu">
      <a href="{{route('index_web')}}" class="block text-gray-800 py-2">Home</a>
      <a href="{{route('addvertesmen')}}" class="block text-gray-800 py-2">Listings</a>
      <a href="#" class="block text-gray-800 py-2">About</a>
      <a href="#" class="block text-gray-800 py-2">Contact</a>
      @if (Route::has('login'))
      @auth
        <a href="{{ url('/dashboard') }}" class="block bg-blue-600 text-white py-2 rounded mt-2 text-center">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="block bg-blue-600 text-white py-2 rounded mt-2 text-center">Login</a>
      @endauth
    @endif
       
    </div>
    
  </nav>

  <section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold mb-4">Discover Amazing Deals on Lanka add.lk</h1>
      <p class="text-lg mb-6">Find what you need, right here in Sri Lanka.</p>
      
      <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-full hover:bg-gray-200">Start Browsing</a>
    </div>
  </section>


