@include('user.user_dashbord')
<div class="flex-1 ml-64">
    <x-app-layout>
        <x-slot name="header">
           
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('property Advertisement') }}
                </h2>
           
        </x-slot>

        <div class="container max-w-6xl mt-5"><!--p-3 -->
            <div class="flex-1 p bg-white p-4"> <!-- p-4-->
              <!--  <a href="" class="btn btn-outline-dark mb-2">Dark</a> -->

                <div class="overflow-x-auto">
                    <div class="table-responsive p-6"><!-- p-6-->
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
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">Category</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">price</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                                                

                                @foreach ($propertys as $property)

                                
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                             
                                    <td class="py-3 px-4 border-b border-gray-200">{{$property->user->name}}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{$property->topic}}</td>
                                    <td class="py-3 px-4 border-b border-gray-200 break-words max-h-24 overflow-auto">{{$property->description}}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{$property->location}}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{$property->phone}}</td>
                                    <td class="border-b border-gray-200">@if($property->image)
                                        <img src="{{ asset('storage/' . $property->image) }}" alt="item Image" width="100">
                                          @endif</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{$property->category}}</td>
                                    <td class="py-3 px-4 border-b border-gray-200">{{$property->price}}</td>

                                    
                                  
                                    
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        <div class="flex justify-start space-x-2">
                                            <a href="{{route('property_edit',$property->id)}}" class="btn btn-outline-warning">update</a>
                                        <form action="{{route('user_property_delete',$property->id)}}" method="post">
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
</div>

