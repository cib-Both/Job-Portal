<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4 text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Find Your Dream Job</h2>
        <p class="text-gray-600 mt-2">Search thousands of job listings across various industries.</p>
    </div>

    <!-- Search Form -->
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-md p-6 mb-8">
        <form action="{{ route('jobs.search') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" name="title" value="{{ request('title') }}" placeholder="Job title or keywords"
                   class="w-full border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <input type="text" name="location" value="{{ request('location') }}" placeholder="Location"
                   class="w-full border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <select name="category" class="w-full border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                Search Jobs
            </button>
        </form>
    </div>

    <!-- Job Results -->
    <div class="container mx-auto px-4">
        @if($jobs->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('jobs.detail', $job->id) }}">
                            <img class="rounded-t-lg w-full h-40 object-cover" src="{{ asset('images/logo.png') }}" alt="logo" />
                        </a>
                        <div class="p-5">
                            <a href="{{ route('jobs.detail', $job->id) }}">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $job->job->title }}
                                </h5>
                            </a>
                            <p class="mb-3 text-gray-700 dark:text-gray-400">
                                {{ Str::limit($job->reqirement, 100) }}
                            </p>
                            <a href="{{ route('jobs.detail', $job->id) }}" 
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $jobs->links() }}
            </div>
        @else
            <p class="text-gray-600 text-center">No jobs found matching your search.</p>
        @endif
    </div>
</section>
