<section class="mt-10 py-10 bg-white dark:bg-gray-900 rounded-lg">
    <div class="container mx-auto px-6">
        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-14 text-gray-900 dark:text-white">
            Job Categories
        </h2>

        <!-- Categories Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 ">
            @foreach ($categories as $category)
                <a class="border-2 dark:border-gray-700 group bg-gray-50 dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-lg dark:hover:shadow-gray-700 hover:-translate-y-1 transition-all text-center p-6 flex flex-col items-center justify-center">
                    
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                        {{ $category->name }}
                    </h3>
                    
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                        {{ $category->jobs_count }} Jobs
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</section>
