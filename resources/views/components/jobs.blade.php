 <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Latest Job Openings</h2>
                <!-- <a href="#" class="text-blue-600 font-medium hover:underline">View All Jobs</a> -->
                <p href="{{ route('jobs') }}" class="mt-5 inline-flex items-center gap-x-1 font-medium text-blue-600 dark:text-blue-500">
                    Contact Developer
                <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-6">
                <!-- Job Card -->
                 @foreach($posts as $post)
                    <x-job-card :post="$post"/>
                @endforeach
            </div>
        </div>
</section>