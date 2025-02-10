@include('addmin.admin_dashbord')

<div class="flex-1 ml-64">
    <x-app-layout>
        <x-slot name="header">
           
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __(' sub catagory') }}
                </h2>
            
        </x-slot>

       
        
        <div class="container max-w-6xl mt-5"><!--p-4 -->
            <div class="flex-1 p-4 bg-white w-100 p-3">
                <a href="{{route('sub_category_create')}}" class="btn btn-outline-dark mb-2">create catogory</a>

                <div class="overflow-x-auto">
                    <div class="table-responsive p-6">
                        <table class="min-w-full w-full table-auto bg-white border border-gray-200" id="table1">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600">
                                    <th class="py-3 px-4 border-b border-gray-200 text-left">number add</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left"> name sub catogory</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left"> name main catogory</th>
                                    <th class="py-3 px-4 border-b border-gray-200 text-left"> action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach ($subcatergorys as $subcatergory)
                                     <tr class="hover:bg-gray-100">
                                
                                    
                                        <td class="py-3 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                                 
                                        <td class="py-3 px-4 border-b border-gray-200">{{$subcatergory->name}}</td>
                                        
                                            
                                        
                        
                                        <td class="py-3 px-4 border-b border-gray-200">{{$subcatergory->catergory->name}}</td>
                                        
                                        

    
                                      {{--  <td class="border-b border-gray-200">@if($catergory->logo)
                                            <img src="{{ asset('storage/' . $catergory->logo) }}" alt="item Image" width="100">

                                            @endif</td> --}}
    
                                        
                                    <td class="py-3 px-4 border-b border-gray-200">
                                        <div class="flex justify-start space-x-2">
                                            <!--<a href="" class="btn btn-outline-warning">update</a>-->

                                        <form action="{{route('sub_category_delete',$subcatergory->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                  
                                            <button class="btn btn-outline-danger"> delete</button>
                                        </form>
                                        <a href="{{route('sub_category_edit',$subcatergory->id)}}" class="btn btn-outline-warning mb-2">update</a>
                                        </div>
                                            </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    </div>
                </div>
            </div>

        

        <!-- Display Success Message -->
       

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
