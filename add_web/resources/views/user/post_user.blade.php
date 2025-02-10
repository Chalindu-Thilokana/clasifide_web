@include('user.user_dashbord')
<div class="flex-1 ml-64  "><!--relative-->
    <x-app-layout>
        <x-slot name="header">
           
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __(' Advertisement') }}
                </h2>
           
        </x-slot>
      
                
             <div class="container max-w-6xl mt-5    "><!--p-3 -->
            
                <div class="flex-1 p-4 bg-white ">
                    <form action="{{route('filter_post_user')}}" method="GET" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="space-y-8">
                          <div class='flex items-end gap-4 pb-4'>
                              <div class="w-1/3">
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select id="category" name="category"  class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                  >
                                  <option value="" disabled selected>Select a mobile phone category</option>
                                  @foreach ($catergorys as $catergory)
                                  <option value="{{$catergory->id}}">{{$catergory->name}}</option>
                                 @endforeach
                                </select>
                               
                              </div>

                              <div class="w-1/3">
                                <label for="subCategory" class="block text-sm font-medium text-gray-700"> sub Category</label>
                                <select id="subCategory" name="subCategory" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="" disabled selected>Select a sub category</option>
                                    @foreach ($subCategorys as $subCategory)
                                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
    
                              <div class="w-1/3">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" name="location" id="location" 
                                  class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              </div>
                              <div class="w-1/3">
                                <label for="topic" class="block text-sm font-medium text-gray-700">ADD TOPIC</label>
                                <input type="text" name="topic" id="topic" 
                                  class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              </div>
    
                              <button type="submit" class="btn btn-outline-dark mb-2 ">filter</a> 
                              
                              
    
                            </div>
                            
                   
                        </div>
                    </form>
                </div>
           </div>
        

     <div class="container max-w-6xl mt-5  "><!--p-3 -->
        <div class="flex-1 p-4 bg-white ">
          
         
          

            <div class="overflow-x-auto ">
                <div class="table-responsive p-6 ">
                    <table class="min-w-full w-full table-auto bg-white border border-gray-200 " id="table1">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600">
                                <th class="py-3 px-4 border-b border-gray-200 text-left">number add</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">owner</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">topic</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">description</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">location</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Phone</th>
                                <th class=" border-b border-gray-200 text-left">Image</th>
                                <th class=" border-b border-gray-200 text-left">Image 2nd</th>
                                <th class=" border-b border-gray-200 text-left">Image 3rd</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Category</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">sub Category</th>

                                <th class="py-3 px-4 border-b border-gray-200 text-left">price</th>
                                <th class="py-3 px-4 border-b border-gray-200 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                                            

                            @foreach ($posts as $post)

                            
                            

                            
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                         
                                <td class="py-3 px-4 border-b border-gray-200">{{$post->user->name}}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{$post->topic}}</td>
                                <td class="py-3 px-4 border-b border-gray-200 break-words max-h-24 overflow-auto">{{$post->description}}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{$post->location}}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{$post->phone}}</td>
                                <td class="border-b border-gray-200">@if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="item Image" width="100">
                                   
                                  
                                      @endif</td>

                                      <td class="border-b border-gray-200">@if($post->image2)
                                        <img src="{{ asset('storage/' . $post->image2) }}" alt="item Image" width="100">

                                        @endif</td>

                                        <td class="border-b border-gray-200">@if($post->image3)
                                            <img src="{{ asset('storage/' . $post->image3) }}" alt="item Image" width="100">

                                            @endif</td>

                                                
                                                    
                                            

                                            <td class="py-3 px-4 border-b border-gray-200"> {{ $post->subCategory->catergory->name ?? 'N/A' }}</td>
                                            <td class="py-3 px-4 border-b border-gray-200"> {{ $post->subCategory->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4 border-b border-gray-200">{{$post->price}}</td>

                                

                                
                                <td class="py-3 px-4 border-b border-gray-200 ">
                                    <div class="flex justify-start space-x-2">
                                    <a href="{{route('post_edit',$post->id)}}" class="btn btn-outline-warning ">update</a> <form action="{{route('user_post_delete',$post->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                          
                                    <button class="btn btn-outline-danger"> delete</button>
                                </form>
                                    </div></td>
                            </tr>
                            
                            @endforeach
                            <!-- Add more rows as needed -->
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
         
        </x-app-layout>
    
</div>

