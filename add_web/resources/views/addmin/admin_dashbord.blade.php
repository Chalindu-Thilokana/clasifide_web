<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LANKA ADD.lk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script>
    function toggleDropdown() {
      document.getElementById("dropdownMenu").classList.toggle("hidden");
    }

    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("hidden");
    }
  </script>
</head>
<body class="flex min-h-screen bg-gray-100 ">
  <!-- Sidebar -->
  <div id="sidebar" class="w-64 h-screen bg-gray-800 text-white flex flex-col h-screen fixed" >
    <div class=" p-4 ">
      <a href="{{ route('dashboard') }}">
    <img src="{{ asset('assets/logo.png') }}" class="h-20 w-15 mr-2 " > <!-- Add your logo here -->
      </a>
    </div>
   
    <div class=" p-4 text-2xl font-semibold border-b border-gray-700 flex items-center">
      <a href="{{ route('dashboard') }}">
        lanka ADD.lk
      </a>
    </div>
    <nav class="flex-1 p-2">
      <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a>

      <a href="{{route('view_post')}}" class="block py-2 px-4 rounded hover:bg-gray-700"> Advertisements</a>
      <!--
      <div class="relative">
        <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700" onclick="toggleDropdown()">Advertisement</a>
        <div id="dropdownMenu" class="hidden absolute left-0 mt-2 w-48 bg-gray-800 rounded shadow-lg">
          <a href="#" class="block py-2 px-4 hover:bg-gray-700 " onclick="closeDropdown()">Ad Type 1</a>
          <a href="#" class="block py-2 px-4 hover:bg-gray-700"onclick="closeDropdown()">Ad Type 2</a>
          <a href="#" class="block py-2 px-4 hover:bg-gray-700"onclick="closeDropdown()">Ad Type 3</a>
          <a href="#" class="block py-2 px-4 hover:bg-gray-700"onclick="closeDropdown()">Ad Type 3</a>
        </div> -->
       {{--
        <div class="dropdown">
          <button class=" block py-2 px-4 rounded hover:bg-gray-700 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Advertisements
          </button>
          <div class="dropdown-menu hidden absolute left-0 mt-2 w-48 bg-gray-800 rounded shadow-lg" aria-labelledby="dropdownMenuButton">
                 
                 <a class="block py-2 px-4 hover:bg-gray-700 text-white" href="{{route('view_vehicle')}}">Vehicle</a>
                <a class="block py-2 px-4 hover:bg-gray-700 text-white" href="{{route('view_phone')}}">Mobile phone</a>
                <a class="block py-2 px-4 hover:bg-gray-700 text-white" href="{{route('view_property')}}">Property</a>
                <a class="block py-2 px-4 hover:bg-gray-700 text-white" href="{{route('view_fashion')}}">Fashion</a>

          </div>

        </div>
      --}}
        <a href="{{route('category_show')}}" class="block py-2 px-4 rounded hover:bg-gray-700">category</a>
        <a href="{{route('sub_category_show')}}" class="block py-2 px-4 rounded hover:bg-gray-700">sub category</a>
      

    </nav>
  </div>
  

  <!-- Main content area -->
  <!--
  <div class="flex-1 ml-64">
    <div class="navbar bg-body-tertiary {{--sticky top-0 z-10" meka fixed karanna puluwan nav bar eka uda pahala yana eka--}}">
        <div class="container-fluid">
          <a class="navbar-brand">Navbar</a>
          
      <div class="relative p-2">
        <button onclick="toggleDropdown()" class="w-full text-left py-2 px-4 rounded hover:bg-gray-300 flex justify-between items-center">
          <span>  {{-- coment    kala {{ Auth::user()->name }} 
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.292 7.292a1 1 0 011.416 0L10 10.586l3.292-3.294a1 1 0 111.416 1.416l-4 4a1 1 0 01-1.416 0l-4-4a1 1 0 010-1.416z" clip-rule="evenodd" />
          </svg>
        </button>
        <div id="dropdownMenu" class="absolute left-0 w-full mt-2 bg-white rounded shadow-lg hidden">
          <a href="{{ route('profile_edit') }}" class="block py-2 px-4 hover:bg-gray-300">Profile</a>
          <form method="POST" action="{{ route('logout') }}" class="block py-2 px-4 hover:bg-gray-300">
                        @csrf

                        <button>
                          {{ __('logout') }}
                        </button>
                    </form>
         
         --}}
        </div>
        coment kala meke karanne profile uppdate ekai log out ekai routes dala coustem hadapu eka--> 
      
        
          
        </div>
    </div>
    </div> 
    
     
    
