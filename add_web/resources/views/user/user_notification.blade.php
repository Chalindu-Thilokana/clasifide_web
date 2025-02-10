@include('user.user_dashbord')
<div class="flex-1 ml-64">
    <x-app-layout>
        <x-slot name="header">
           
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('notification') }}
                </h2>
           
        </x-slot>
        <div class="container mx-auto mt-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-semibold text-gray-700">Notifications</h2>
                <button class="btn btn-primary">Mark All as Read</button>
            </div>
    
            <!-- Notification Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                <!-- Single Notification Card -->
              
                
                <div class="bg-white shadow-lg rounded-lg p-4 border-l-4 
                            
                            
                              'border-gray-300' : 'border-blue-500' ">
                    <div class="flex items-start">
                        <div class="text-blue-500">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405 1.405A2.032 2.032 0 0118.158 19H5.843a2.032 2.032 0 01-1.437-.595L3 17h5m0-4v4m10-10h.01M9 3v4m6-4v4M4 6h16m-4 4H8m6 0v10m-4-10V7m-1 5h10m0 0v6a1 1 0 01-1 1H6a1 1 0 01-1-1v-6m1-4v4M5 7h4v4H5V7z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-800">hjgujh</h4>
                            <p class="text-sm text-gray-600 mt-1">uhgyuydsfhueahfedwrgv</p>
                            <p class="text-xs text-gray-400 mt-2">hkdkvd</p>
                        </div>
                    </div>
                    <div class="mt-4 text-right">
                        <button class="btn btn-sm btn-outline-primary">
                            Mark as hjujk
                        </button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </div>
                </div>
                
                
            </div>
        </div>
    
        <!-- Bootstrap and Tailwind CDN JS -->
      
    </x-app-layout>