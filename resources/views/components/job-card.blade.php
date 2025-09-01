<div class=" bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 dark:bg-gray-800 dark:border-gray-700">
    <!-- Company Logo Section -->
    <div class="p-8 pb-6">
        <div class="flex items-start space-x-5">
            <div class="flex-shrink-0 group">
                <img class="w-16 h-16 rounded-xl object-cover dark:border-gray-600 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3"
                     src="{{ $post->job && $post->job->company && $post->job->company->logo ? asset('storage/' . $post->job->company->logo) : asset('images/default-logo.png') }}"
                     alt="{{ $post->job->company->name ?? 'Company' }} Logo" />
            </div>
            <div class="flex-1 min-w-0">
                <a href="{{ route('jobs.detail', $post->id) }}" class="group">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 leading-tight group-hover:text-blue-600 transition-colors duration-200">
                        {{ $post->job->title ?? 'No Title' }}
                    </h3>
                </a>
                <p class="text-base text-gray-600 dark:text-gray-400 font-medium">
                    {{ $post->job->company->name ?? 'Unknown Company' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Job Details -->
    <div class="px-8 pb-8">
        <div class="flex flex-col gap-4 mb-6">
            <!-- Salary - Bigger Box -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-2 group hover:bg-green-100 transition-colors duration-200 dark:bg-green-900/20 dark:border-green-800">
                <div class="flex items-center text-lg text-green-700 dark:text-green-300">
                    <div class="flex-shrink-0 mr-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-200 transition-colors duration-200 dark:bg-green-800 dark:group-hover:bg-green-700">
                            <svg class="w-6 h-6 transition-all duration-300 group-hover:scale-125 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-green-600 dark:text-green-400 mb-1">Salary Range</p>
                    @if($post->salary_option === 'pay')
                        <p class="font-semibold text-green-800 dark:text-green-200">{{ $post->salary }}$</p>
                    @elseif($post->salary_option === 'negotiable')
                        <p class="font-semibold text-green-800 dark:text-green-200">Negotiable</p>
                    @endif
                    </div>
                </div>
            </div>

            <!-- Skills Required -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-2 group hover:bg-blue-100 transition-colors duration-200 dark:bg-blue-900/20 dark:border-blue-800">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-4 mt-1">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-200 dark:bg-blue-800 dark:group-hover:bg-blue-700">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300 transition-all duration-300 group-hover:scale-125 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400 mb-2">Skills Required</p>
                        <div class="flex flex-wrap gap-2">
                            @if(isset($post->skill) && is_array($post->skill))
                                @foreach(array_slice($post->skill, 0, 3) as $skill)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors duration-200 dark:bg-blue-800 dark:text-blue-200">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                                @if(count($post->skill) > 3)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                        +{{ count($post->skill) - 3 }} more
                                    </span>
                                @endif
                            @elseif(isset($post->skill))
                                @foreach(array_slice(explode(',', $post->skill), 0, 3) as $skill)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors duration-200 dark:bg-blue-800 dark:text-blue-200">
                                        {{ trim($skill) }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-sm text-blue-700 dark:text-blue-300">Skills not specified</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Location -->
            <div class="flex items-center text-base text-gray-700 dark:text-gray-300 group hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                <div class="flex-shrink-0 mr-4">
                    <svg class="w-5 h-5 transition-all duration-300 group-hover:scale-125 group-hover:-translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <span class="font-medium">{{ $post->location ?? 'Remote Work Available' }}</span>
            </div>
            
            <!-- Job Type -->
            <div class="flex items-center text-base text-gray-700 dark:text-gray-300 group hover:text-purple-600 dark:hover:text-purple-400 transition-colors duration-200">
                <div class="flex-shrink-0 mr-4">
                    <svg class="w-5 h-5 transition-all duration-300 group-hover:scale-125 group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="font-medium">{{ ucfirst($post->type ?? 'None') }}</span>
            </div>
        </div>

        <!-- Action Button -->
        <a href="{{ route('jobs.detail', $post->id) }}" 
           class="group w-full inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-blue-700 rounded-lg hover:bg-blue-800">
            <span class="mr-3">View Job Details</span>
            <svg class="w-5 h-5 transition-all duration-300 group-hover:translate-x-1 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>

        <!-- Additional Info -->
        @if(isset($post->created_at))
        <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                <svg class="w-4 h-4 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Posted {{ $post->created_at->diffForHumans() }}
            </p>
        </div>
        @endif
    </div>
</div>