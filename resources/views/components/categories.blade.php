<section class="py-16 bg-white dark:bg-gray-900" x-data="{ scrollPos: 0 }">
    <div class="container mx-auto px-6">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Categories
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-lg">
                Find your perfect job across different industries
            </p>
        </div>

        <div class="relative">
            <!-- Left Arrow (hidden on small screens) -->
            <button @click="scrollPos = Math.max(scrollPos - 200, 0); $refs.scrollContainer.scrollTo({ left: scrollPos, behavior: 'smooth' })"
                    class="md:flex absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white dark:bg-gray-800 p-2 rounded-full shadow hover:bg-blue-100 dark:hover:bg-blue-900/50 transition">
                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Right Arrow (hidden on small screens) -->
            <button @click="scrollPos = scrollPos + 200; $refs.scrollContainer.scrollTo({ left: scrollPos, behavior: 'smooth' })"
                    class="md:flex absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white dark:bg-gray-800 p-2 rounded-full shadow hover:bg-blue-100 dark:hover:bg-blue-900/50 transition">
                <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Categories Scroll Container -->
            <div class="flex space-x-4 sm:space-x-6 md:space-x-8 overflow-x-auto scrollbar-hide py-4 px-12" x-ref="scrollContainer">
                @foreach ($categories as $category)
                    <div class="flex-shrink-0 w-40 sm:w-44 md:w-48 lg:w-52 
                                group bg-white dark:bg-gray-800 rounded-xl p-5 sm:p-6 text-center 
                                border border-gray-200 dark:border-gray-700 dark:hover:shadow-gray-700
                                hover:shadow-md hover:border-blue-200 dark:hover:border-blue-700 
                                transition-all duration-200 cursor-pointer">
                        
                        <!-- Category Icon -->
                        <div class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-100 dark:bg-blue-900/30 
                                    rounded-xl flex items-center justify-center mx-auto mb-3 sm:mb-4 
                                    group-hover:bg-blue-200 dark:group-hover:bg-blue-900/50 
                                    transition-colors duration-200">   
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        
                        <!-- Category Name -->
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-1 sm:mb-2 
                                    group-hover:text-blue-600 dark:group-hover:text-blue-400 
                                    transition-colors duration-200 text-sm sm:text-base">
                            {{ $category->name }}
                        </h3>
                        
                        <!-- Job Count -->
                        <p class="text-gray-500 dark:text-gray-400 text-xs sm:text-sm">
                            {{ $category->available_jobs_count }} {{ $category->available_jobs_count == 1 ? 'Job' : 'Jobs' }} Available
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
