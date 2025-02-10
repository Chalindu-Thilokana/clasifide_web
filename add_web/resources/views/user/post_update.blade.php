@include('user.user_dashbord')
<div class="flex-1 ml-64">
<x-app-layout>
    <x-slot name="header">
       
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Advertisement update') }}
        </h2 >
       
    </x-slot>
   
    <div class="p-5 mt-5">
      <div class="p-5 max-w-4xl mx-auto bg-gray-100 rounded-lg shadow-lg">
          <div class="overflow-x-auto bg-white p-6 rounded-lg">
              <div class="container mt-5">
                  <form action="{{route('update_post_add', $post->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                      @csrf
                      @method('PUT') <!-- Method spoofing for PUT request -->

                      <div class="space-y-8">
                          <!-- Title Section -->
                          <div class="border-b border-gray-300 pb-4">
                              <h2 class="text-lg font-semibold text-gray-700">Update Advertisement Information</h2>
                              <p class="mt-1 text-sm text-gray-500">Update the necessary information for your Advertisement.</p>
                          </div>

                          <!-- Form Fields -->
                          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                              <!-- Topic -->
                              <div>
                                  <label for="topic" class="block text-sm font-medium text-gray-700">Topic</label>
                                  <input type="text" name="topic" id="topic" value="{{  $post->topic }}" required
                                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              </div>

                              <!-- Description -->
                              <div class="col-span-1 sm:col-span-2">
                                  <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                  <textarea name="description" id="description" rows="4" required maxlength="1000"
                                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $post->description }}</textarea>
                              </div>

                              <!-- Location -->
                              <div class="col-span-1 sm:col-span-2">
                                  <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                  <input type="text" name="location" id="location" value="{{ $post->location }}" required
                                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              </div>

                              <!-- Phone Number -->
                              <div>
                                  <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                  <input type="tel" name="phone" id="phone" value="{{$post->phone }}" required
                                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                      placeholder="123-456-7890" pattern="\d{10}">
                              </div>

                              <!-- File Upload -->
                              <div>
                                  <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                                  {{-- awashya na if eka @if ($update_data->image) --}}
                                  <div class="mb-2">
                                      <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg">
                                  </div>

                                  
                            {{--  @endif --}}
                                  <input type="file" name="image" id="image"
                                      class="mt-2 block w-full text-lg border border-gray-300 rounded-lg shadow-sm p-2 bg-gray-50 sm:text-sm" value="{{ $post->image }}">
                                  <p class="text-sm text-gray-500">Current image</p>
                              </div>



                              <div>
                                <label for="image" class="block text-sm font-medium text-gray-700"> scond Upload Image</label>

                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image2) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg">
                                </div>

                                <input type="file" name="image2" id="image"
                                  class="mt-2 block w-full text-lg border border-gray-300 rounded-lg shadow-sm p-2 bg-gray-50 sm:text-sm" value="{{ $post->image2 }}">
                              </div>



                              <div>
                                <label for="image" class="block text-sm font-medium text-gray-700"> third Upload Image</label>

                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image3) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-lg">
                                </div>
                                <input type="file" name="image3" id="image"
                                  class="mt-2 block w-full text-lg border border-gray-300 rounded-lg shadow-sm p-2 bg-gray-50 sm:text-sm" accept="image/{{$post->image3}}"  >
                                  
                              </div>
                              

                              <!-- Category -->
                             

                              
                  <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" required
                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="" disabled >Select a mobile phone category</option>
                      @foreach ($catergorys as $catergory)
                      <option value="{{$catergory->id}}"{{ $post->catergory_id == $catergory->id ? 'selected' : '' }}>{{$catergory->name}}</option>
                     @endforeach
                    </select>
                  </div>

                              <!-- Price -->
                              <div>
                                  <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                  <input type="number" name="price" id="price" value="{{  $post->price }}" required min="0" step="0.01"
                                      class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                      placeholder="0.00">
                              </div>
                          </div>

                          <!-- Save Button -->
                          <div class="mt-6 flex justify-end">
                              <button type="submit" class="btn btn-outline-dark">
                                  Update
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