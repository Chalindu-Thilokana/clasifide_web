@include('web_site.component.nav_bar')

<div class="max-w-7xl mx-auto p-6">
    <!-- Product Details Section -->
    

    <!-- Image Gallery with Carousel and Thumbnails -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Carousel -->
        <div class="w-full">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-96 overflow-hidden rounded-lg shadow-lg">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        @if($post->image && file_exists(public_path('storage/' . $post->image)))
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover" alt="Image 1">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="w-full h-full object-cover" alt="Default Image">
                        @endif
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        @if($post->image2 && file_exists(public_path('storage/' . $post->image2)))
                            <img src="{{ asset('storage/' . $post->image2) }}" class="w-full h-full object-cover" alt="Image 2">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="w-full h-full object-cover" alt="Default Image">
                        @endif
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        @if($post->image3 && file_exists(public_path('storage/' . $post->image3)))
                            <img src="{{ asset('storage/' . $post->image3) }}" class="w-full h-full object-cover" alt="Image 3">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="w-full h-full object-cover" alt="Default Image">
                        @endif
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-1/2 left-4 z-30 flex items-center justify-center w-10 h-10 bg-white/50 rounded-full hover:bg-white/80 focus:outline-none" data-carousel-prev>
                    <span class="sr-only">Previous</span>
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button type="button" class="absolute top-1/2 right-4 z-30 flex items-center justify-center w-10 h-10 bg-white/50 rounded-full hover:bg-white/80 focus:outline-none" data-carousel-next>
                    <span class="sr-only">Next</span>
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            <!-- Thumbnails -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="cursor-pointer" data-carousel-thumbnail="0">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/default.jpg') }}" class="w-full h-20 object-cover rounded-lg" alt="Thumbnail 1">
                </div>
                <div class="cursor-pointer" data-carousel-thumbnail="1">
                    <img src="{{ $post->image2 ? asset('storage/' . $post->image2) : asset('images/default.jpg') }}" class="w-full h-20 object-cover rounded-lg" alt="Thumbnail 2">
                </div>
                <div class="cursor-pointer" data-carousel-thumbnail="2">
                    <img src="{{ $post->image3 ? asset('storage/' . $post->image3) : asset('images/default.jpg') }}" class="w-full h-20 object-cover rounded-lg" alt="Thumbnail 3">
                </div>
            </div>
        </div>

        <!-- Product Details and Customization -->
        <div class="bg-white p-8 rounded-lg shadow-xl transform transition-all hover:scale-105 hover:shadow-2xl">
            <!-- Product Title -->
            <h3 class="text-2xl font-bold mb-6 text-gray-800 border-b-2 border-gray-200 pb-4">Product Details</h3>
        
            <!-- Description -->
            <p class="text-gray-600 mb-6 leading-relaxed">
                {{ $post->description ?? 'No description available.' }}
            </p>
        
            <!-- Published Date -->
            <p class="text-sm text-gray-500 mb-6 italic">
                Published: {{ $post->created_at->format('M d, Y') }}
            </p>
        
            <!-- Product Info -->
            <div class="text-center mb-8">
                <!-- Topic -->
                <h2 class="text-4xl font-bold mb-4 text-gray-900">{{ $post->topic }}</h2>
        
                <!-- Seller Info -->
                <p class="text-gray-600 mb-2">Sold by: <span class="font-semibold text-gray-800">{{ $post->user->name }}</span></p>
                <p class="text-gray-600 mb-4">{{ $post->location }} | {{ $post->phone }}</p>
        
                <!-- Price -->
                <p class="text-gray-700 mt-6">
                    Price: <span class="text-3xl font-bold text-green-600">${{ $post->price }}</span>
                </p>
        
                <!-- Category -->
                <p class="mt-4 text-gray-600">
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">
                        {{ $post->subCategory->catergory->name ?? 'N/A' }} > {{ $post->subCategory->name ?? 'N/A' }}
                    </span>
                </p>
            </div>
        
            <!-- Call to Action Button -->
            <div class="text-center">
                <button class="bg-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition-all transform hover:scale-110">
                    Contact Seller
                </button>
            </div>
        </div>
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
<!-- Carousel Script -->
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

@include('web_site.component.footer')