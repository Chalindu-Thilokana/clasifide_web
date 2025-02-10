@include('addmin.admin_dashbord')
<div class="flex-1 ml-64">
<x-app-layout>
    <x-slot name="header">
       
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('catergorycreate') }}
        </h2 >
       
    </x-slot>
    <div class="p-5 mt-5">
      <div class="p-5 max-w-4xl mx-auto bg-gray-100 rounded-lg shadow-lg">
        <div class="overflow-x-auto bg-white p-6 rounded-lg">
          <div class="container mt-5">
            <form action="{{route('category_update',$catergory->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
              @csrf
              @method('PUT')
              <div class="space-y-8">
                <!-- Title Section -->
                <div class="border-b border-gray-300 pb-4">
                  <h2 class="text-lg font-semibold text-gray-700">catergory</h2>
                  <p class="mt-1 text-sm text-gray-500"> advertisement catergory </p>
                </div>
    
                <!-- Form Fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                  <!-- ADD TOPIC -->
                  <div>
                    <label for="topic" class="block text-sm font-medium text-gray-700">ADD catergory name</label>
                    <input type="text" name="name" id="topic" required
                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{$catergory->name}}">
                  </div>
                 {{--
                  <!-- Seller Name -->
                  <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">SELLER NAME</label>
                    <input type="text" name="name" id="name" required
                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  </div>
    
                  <!-- Email Address -->
                  <div class="col-span-1 sm:col-span-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" name="email" id="email" required
                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  </div>
                  --}}
    
                  <!-- Description -->
                
                  <!-- File Upload -->

                  <div>
                    <label for="image" class="block text-sm font-medium text-gray-700"> scond Upload Image</label>
                    <div class="mb-2">
                      <img src="{{ asset('storage/' . $catergory->logo) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg">
                  </div>
                    <input type="file" name="logo" id="image" accept=".png"  
                      class="mt-2 block w-full text-lg border border-gray-300 rounded-lg shadow-sm p-2 bg-gray-50 sm:text-sm">
                  </div>
    
                
    
                <!-- Save Button -->
                <div class="mt-6 flex justify-end">
                  <button type="submit" class="btn btn-outline-dark">
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
</x-app-layout>
  
</div>
</body>
</html>