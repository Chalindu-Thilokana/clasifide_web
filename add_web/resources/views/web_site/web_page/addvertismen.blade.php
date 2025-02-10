@include('web_site.component.nav_bar')


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex-1 p-4 bg-white">
    <form action="{{ route('addvertesmen_filer') }}" method="GET" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="space-y-8">
            <div class='flex items-end gap-4 pb-4'>
                <div class="w-1/3">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($catergorys as $catergory)
                            <option value="{{ $catergory->id }}" data-subCategorys="{{ json_encode($catergory->subCategorys) }}">{{ $catergory->name }}</option>
                        @endforeach
                    </select>
                </div>
              
                <div class="w-1/3">
                    <label for="subCategory" class="block text-sm font-medium text-gray-700">Sub Category</label>
                    <select id="subCategory" name="subCategory" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="" disabled selected>Select a sub category</option>
                      @foreach ($subCategorys as $subcategory)
                          <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                      @endforeach
                  </select>
                </div>
                 

  
                <div class="w-1/3">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="w-1/3">
                    <label for="topic" class="block text-sm font-medium text-gray-700">ADD TOPIC</label>
                    <input type="text" name="topic" id="topic" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Filter</button>
            </div>
        </div>
    </form>
</div>

<!-- Popular Listings Section -->







  <div class="container mx-auto text-center py-8">
   
      <div class="container mx-auto text-center">
          <h2 class="text-2xl font-bold mb-6"></h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <!-- Listing Card -->
              @foreach($posts as $post)
              <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
                  <a href="{{ route('addvertesmen_details', $post->id) }}">
                      <img class="p-8 rounded-t-lg" src="{{ asset('storage/' . $post->image) }}" alt="Listing Image" />
                  </a>
                  <div class="px-5 pb-5">
                      <a href="{{ route('addvertesmen_details', $post->id) }}">
                          <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $post->topic }}</h5>
                      </a>
                      
                    
                      <div class="flex items-center justify-between">
                          <span class="text-3xl font-bold text-gray-900">${{ $post->price }}</span>
                          <a href="{{ route('addvertesmen_details', $post->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">View Details</a>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
    </section>
    <div class="flex justify-center mt-4">
      <nav aria-label="Pagination" class="flex items-center">
          {{-- Previous Page Link --}}
          @if ($posts->onFirstPage())
              <span class="cursor-not-allowed text-gray-400">Previous</span>
          @else
              <a href="{{ $posts->previousPageUrl() }}" class="text-blue-600 hover:text-blue-900">Previous</a>
          @endif
  
          {{-- Pagination Numbers --}}
          <ul class="flex space-x-1 mx-4">
              @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                  @if ($page == $posts->currentPage())
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
          @if ($posts->hasMorePages())
              <a href="{{ $posts->nextPageUrl() }}" class="text-blue-600 hover:text-blue-900">Next</a>
          @else
              <span class="cursor-not-allowed text-gray-400">Next</span>
          @endif
      </nav>
  </div>
    
  
  </div>




<!-- Call to Action Section -->
<section class="bg-blue-600 text-white py-12 text-center">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Got Something to Sell?</h2>
        <p class="text-lg mb-6">Join Lanka add.lk and start listing your items today!</p>
        <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-full hover:bg-gray-200">Create a Listing</a>
    </div>
</section>


  


@include('web_site.component.footer')
