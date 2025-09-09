<section class="py-16 bg-white dark:bg-gray-900" 
    x-data="{ showAll: false }">
    <div class="container mx-auto px-6">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-4 dark:bg-blue-900/30 dark:text-blue-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0v-5a2 2 0 00-2-2h-4a2 2 0 00-2 2v5"/>
                </svg>
                Trusted by Leading Companies
            </div>
            <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Featured Companies
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
                Join thousands of professionals working with these amazing companies
            </p>
        </div>

        <!-- Companies Grid Wrapper -->
        <div class="relative">
            <!-- Companies Grid with smooth transition -->
            <div 
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 transition-all duration-700 ease-in-out overflow-hidden"
                :class="showAll ? 'max-h-[4000px]' : 'max-h-[750px]'"
            >
                @foreach ($companies as $company)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md dark:hover:shadow-gray-800 border border-gray-200 dark:border-gray-700 transition-shadow duration-200">
                        <!-- Company Logo -->
                        <div class="p-8 pb-6 text-center">
                            <div class="w-20 h-20 bg-gray-50 dark:bg-gray-700 rounded-xl shadow-sm flex items-center justify-center mx-auto border border-gray-100 dark:border-gray-600">
                                <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('images/default-company.png') }}"
                                     alt="{{ $company->name }}"
                                     class="w-14 h-14 object-contain">
                            </div>
                        </div>

                        <!-- Company Info -->
                        <div class="px-6 pb-6 text-center">
                            <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2">
                                {{ $company->name }}
                            </h3>
                            
                            <!-- Job Count -->
                            <div class="inline-flex items-center px-3 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 
                                          00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 
                                          012 2v6a2 2 0 01-2 2H8a2 2 0 
                                          01-2-2V8a2 2 0 012-2V6"/>
                                </svg>
                                {{ $company->published_jobs_count }} {{ $company->published_jobs_count == 1 ? 'Position' : 'Positions' }}
                            </div>
                            
                            @if($company->description)
                            <p class="text-gray-500 dark:text-gray-400 text-sm mt-3 leading-relaxed">
                                {{ Str::limit($company->description, 80) }}
                            </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Fade/Blur Overlay (only when collapsed) -->
            <div 
                x-show="!showAll" 
                x-transition.opacity.duration.700ms
                class="absolute bottom-0 left-0 w-full h-72 bg-gradient-to-t from-white dark:from-gray-900 to-transparent pointer-events-none">
            </div>
        </div>

        <!-- Toggle Button -->
        <div class="text-center mt-8">
            <button @click="showAll = !showAll"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                <span x-show="!showAll">Show More</span>
                <span x-show="showAll">Show Less</span>
                
                <svg x-show="!showAll" class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
                <svg x-show="showAll" class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                </svg>
            </button>
        </div>
    </div>
</section>
