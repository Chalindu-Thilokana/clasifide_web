@include('web_site.component.nav_bar')


  {{--<div class="flex-1 p-4 bg-white">
    <form action="{{ route('filter_post_user') }}" method="GET" enctype="multipart/form-data" class="space-y-6">
      @csrf
      <div class="space-y-8">
        <div class='flex flex-col md:flex-row items-end gap-4 pb-4'>
          <div class="w-full md:w-1/3">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category" id="category" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value=""disabled selected >Select a mobile phone category</option>
                @foreach ($filter_catergorys as $catergory)
                <option value="{{$catergory->id}}">{{$catergory->name}}</option>
               @endforeach
              </select>
          </div>
  
          <div class="w-full md:w-1/3">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" 
              class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
  
          <div class="w-full md:w-1/3">
            <label for="topic" class="block text-sm font-medium text-gray-700">Add Topic</label>
            <input type="text" name="topic" id="topic" 
              class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
  
          <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Search
          </button>
        </div>
      </div>
    </form>
  </div>
--}}
            
    
  <!-- Categories Section -->
  <section class="py-12 bg-gray-100">
    <div class="container mx-auto text-center">
      <h2 class="text-2xl font-bold mb-6">Browse by Categories</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Category Card -->
        @foreach ($catergorys as $category)

        <a href="{{ route('addvertesmen_filer', ['category' => $category->id]) }}">
        <div class="bg-white p-6 rounded-lg shadow-md">
         
          <img src="{{ asset('storage/' . $category->logo) }}" alt="Category 1" class="w-50 h-50 object-cover rounded">
          <h3 class="text-lg font-bold mt-4">{{ $category->name }}</h3>
          
          
          

            
          
       
        </div>
      </a>
        @endforeach
        <!-- Add more categories as needed -->
      </div> 
      <div class="flex justify-center mt-4">
        <nav aria-label="Pagination" class="flex items-center">
            {{-- Previous Page Link --}}
            @if ($catergorys->onFirstPage())
                <span class="cursor-not-allowed text-gray-400">Previous</span>
            @else
                <a href="{{ $catergorys->previousPageUrl() }}" class="text-blue-600 hover:text-blue-900">Previous</a>
            @endif
    
            {{-- Pagination Numbers --}}
            <ul class="flex space-x-1 mx-4">
                @foreach ($catergorys->getUrlRange(1, $catergorys->lastPage()) as $page => $url)
                    @if ($page == $catergorys->currentPage())
                        <li>
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-md">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="text-blue-600 hover:text-blue-900 px-3 py-1 rounded-md transition">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
    
            {{-- Next Page Link --}}
            @if ($catergorys->hasMorePages())
                <a href="{{ $catergorys->nextPageUrl() }}" class="text-blue-600 hover:text-blue-900">Next</a>
            @else
                <span class="cursor-not-allowed text-gray-400">Next</span>
            @endif
        </nav>
    </div>
      
    
    </div>
  </section>

  <!-- Popular Listings Section -->
  <section class="py-12 bg-white">
    
  </section>

  <!-- Call to Action Section -->
  <section class="bg-blue-600 text-white py-12 text-center">
    <div class="container mx-auto">
      <h2 class="text-2xl font-bold mb-4">Got Something to Sell?</h2>
      <p class="text-lg mb-6">Join Lanka add.lk and start listing your items today!</p>
      <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-full hover:bg-gray-200">Create a Listing</a>
    </div>
  </section>


@include('web_site.component.footer')