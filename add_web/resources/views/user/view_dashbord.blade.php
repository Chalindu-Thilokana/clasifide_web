@include('user.user_dashbord')

<div class="flex-1 ml-64">
    <x-app-layout>
        <x-slot name="header">
           
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('user dashboard') }}
                </h2>
            
        </x-slot>
  {{--
        <div class="container mx-auto mt-4 p-3 border border-gray-300 rounded-lg shadow-md max-w-6xl">
            <!-- Flexbox to align items to the left with wrapping -->
            <div class="flex flex-wrap justify-between">
                <!-- Loop for dynamic categories -->
                @foreach($categories as $category)
                <div class="w-1/6 bg-gray-800 text-white p-3 rounded-lg shadow-lg transition-transform transform hover:scale-105 m-[10px]">
                    <h4 class="text-md font-semibold mb-1 text-center">{{ $category->name }}</h4>
                    <p class="text-lg font-bold text-center">{{ $category->user_posts_count }}</p>
                    @if($category->logo)
                    <img src="{{ asset('storage/' . $category->logo) }}" alt="item Image" width="50" class="mx-auto">

                @endif
                </div>
                @endforeach
            </div>
        </div>
         --}}
         <div class="container mx-auto mt-4 p-3 border border-gray-300 rounded-lg shadow-md max-w-6xl">
            <section class="py-12 bg-gray-100">
                <div class="container mx-auto text-center">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Category Card -->
                        @foreach ($categories as $category)
                        <div class="bg-white p-3 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="flex items-center  justify-center space-x-4">
                                <!-- Image -->
                                <img src="{{ asset('storage/' . $category->logo) }}" alt="Category" class="w-18 h-8 object-cover rounded">
        
                                <!-- Text -->
                                <div>
                                    <h3 class="text-sm font-bold">{{ $category->name }}</h3>
                                    <p class="text-xs font-bold text-center">{{ $category->user_posts_count  }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> 
                    <div class="flex justify-center mt-4">
                        <nav aria-label="Pagination" class="flex items-center">
                            {{-- Previous Page Link --}}
                            @if ($categories->onFirstPage())
                                <span class="cursor-not-allowed text-gray-400">Previous</span>
                            @else
                                <a href="{{ $categories->previousPageUrl() }}" class="text-blue-600 hover:text-blue-900">Previous</a>
                            @endif
                    
                            {{-- Pagination Numbers --}}
                            <ul class="flex space-x-1 mx-4">
                                @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                    @if ($page == $categories->currentPage())
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
                            @if ($categories->hasMorePages())
                                <a href="{{ $categories->nextPageUrl() }}" class="text-blue-600 hover:text-blue-900">Next</a>
                            @else
                                <span class="cursor-not-allowed text-gray-400">Next</span>
                            @endif
                        </nav>
                    </div>
                </div>
            </section>
        </div>
        
  

        
        

        
        <div class="container max-w-6xl mt-5"><!--p-4 -->
            
            <div class="flex-1 p-4 bg-white w-100 p-3">
                <a href="{{route('add_create')}}" class="btn btn-outline-dark mb-2">create Advertisement</a>

                <div class="overflow-x-auto">
                    <div class="table-responsive p-6">
                        <table class="min-w-full w-full table-auto bg-white border border-gray-200" id="table1">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600">
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">number add</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">owner</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">topic</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">description</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">location</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">Phone</th>
                                    <th class=" border-b border-gray-200 text-left">Image</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">sub Category</th>

                                    <th class="py-3 px-4 border-b border-gray-200 text-left">Category</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">price</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">status</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($add_creates as $add_create)

                                    
                                     <tr class="hover:bg-gray-100">
                                
                                    
                                        <td class="py-3 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                                 
                                        <td class="py-3 px-4 border-b border-gray-200">{{$add_create->user->name}}</td>
                                        <td class="py-3 px-4 border-b border-gray-200">{{$add_create->topic}}</td>
                                        <td class="py-3 px-4 border-b border-gray-200 break-words max-h-24 overflow-auto">{{$add_create->description}}</td>
                                        <td class="py-3 px-4 border-b border-gray-200">{{$add_create->location}}</td>
                                        <td class="py-3 px-4 border-b border-gray-200">{{$add_create->phone}}</td>
                                        <td class="border-b border-gray-200">@if($add_create->image)
                                            <img src="{{ asset('storage/' . $add_create->image) }}" alt="item Image" width="100">
                                              @endif</td>

                                                  
                                              
                                        <td class="py-3 px-4 border-b border-gray-200"> @if($add_create->subCategory)
                                            {{ $add_create->subCategory->name }}
                                        @else
                                            No Subcategory
                                        @endif
                                        </td>
                                        <td class="py-3 px-4 border-b border-gray-200">{{$add_create->subCategory->catergory->name}}</td>


                                        <td class="py-3 px-4 border-b border-gray-200">{{$add_create->price}}</td>
    
                                        <td class="py-3 px-4 border-b border-gray-200">{{$add_create->status}}</td>
    
                                        
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        <div class="flex justify-start space-x-2">
                                            <!--<a href="" class="btn btn-outline-warning">update</a>-->

                                        <form action="{{route('add_delete',$add_create->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                  
                                            <button class="btn btn-outline-danger"> delete</button>
                                        </form>
                                        
                                        </div>
                                            </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script>
              $(document).ready(function() {
                  $('#table1').DataTable({
                      responsive: true,
                      // Additional DataTable configurations can be added here
                  });
              });
            </script>
       
    </div>
</x-app-layout>
</div>
