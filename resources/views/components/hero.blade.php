<div id="modern-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-72 md:h-[500px] lg:h-[600px] overflow-hidden rounded-2xl shadow-lg">
        
        <!-- Item 1 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/office1.jfif') }}" class="absolute w-full h-full object-cover" alt="office1">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-10">
                <div class="text-white max-w-xl">
                    <h2 class="text-2xl md:text-4xl font-bold mb-3">Work in a Creative Space</h2>
                    <p class="text-sm md:text-lg mb-4">Join a community that values innovation and collaboration.</p>
                    <a href="{{ route('jobs') }}" class="inline-block px-5 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition">Browse Jobs</a>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/office2.jfif') }}" class="absolute w-full h-full object-cover" alt="office2">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-10">
                <div class="text-white max-w-xl">
                    <h2 class="text-2xl md:text-4xl font-bold mb-3">Grow with Top Companies</h2>
                    <p class="text-sm md:text-lg mb-4">Discover opportunities with leading employers in every industry.</p>
                    <a href="{{ route('about') }}" class="inline-block px-5 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition">About Us</a>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/office3.jfif') }}" class="absolute w-full h-full object-cover" alt="office3">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-10">
                <div class="text-white max-w-xl">
                    <h2 class="text-2xl md:text-4xl font-bold mb-3">Flexible Workspaces</h2>
                    <p class="text-sm md:text-lg mb-4">Choose from jobs that support hybrid and remote work styles.</p>
                    <a href="{{ route('contact') }}" class="inline-block px-5 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition">Contact Us</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-2 bottom-5 left-1/2 -translate-x-1/2">
        <button type="button" class="w-10 h-1 rounded-full transition-all" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-10 h-1 rounded-full transition-all" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-10 h-1 rounded-full transition-all" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-5 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-black/30 group-hover:bg-black/50 transition">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-5 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-black/30 group-hover:bg-black/50 transition">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </span>
    </button>
</div>
