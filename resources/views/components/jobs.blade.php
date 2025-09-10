 <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="flex justify-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold dark:text-white">Latest Jobs Available</h2>
            </div>
            <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-4">
                @foreach($posts as $post)
                <x-job-card :post="$post"/>
                @endforeach
            </div>
            <div class="flex justify-center mt-10">       
                <a href="{{ route('jobs') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 font-medium text-white 
                          bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 
                          focus:outline-none transition duration-300 group">
                    View all jobs
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" 
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </div>
        </div>
</section>