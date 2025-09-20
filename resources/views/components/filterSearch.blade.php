@props(['posts', 'categories', 'locations', 'jobTypes', 'jobTypeCounts'])

<!-- Main Container -->
<form method="GET" action="{{ route('jobs') }}" id="filter-form" class="flex gap-6">

    <div class="hidden lg:block w-80 bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 h-fit sticky top-24 scrollbar-none">
        
        <!-- Filter Header -->
        <div class="p-6 border-b border-slate-200 dark:border-slate-700">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                    Filters
                </h3>
            </div>
        </div>

        <!-- Filter Content -->
        <div class="p-6 space-y-6 max-h-[calc(100vh-200px)] overflow-y-auto scrollbar-none">
            
            <!-- Job Category Filter -->
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                    Category
                </h4>
                <select name="category" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Location Filter -->
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                    Location
                </h4>
                <select name="location" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    <option value="">All Locations</option>
                    @foreach($locations as $location)
                        <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                            {{ $location }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Salary Filter -->
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                    Salary
                </h4>
                <div class="space-y-2">
                    <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                        <input type="radio" name="salary_option" value="" {{ request('salary_option') == '' ? 'checked' : '' }} onchange="toggleSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700 dark:text-slate-300">All</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                        <input type="radio" name="salary_option" value="not" {{ request('salary_option') == 'not' ? 'checked' : '' }} onchange="toggleSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700 dark:text-slate-300">Unpaid</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                        <input type="radio" name="salary_option" value="negotiable" {{ request('salary_option') == 'negotiable' ? 'checked' : '' }} onchange="toggleSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700 dark:text-slate-300">Negotiable</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                        <input type="radio" name="salary_option" value="pay" {{ request('salary_option') == 'pay' ? 'checked' : '' }} onchange="toggleSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700 dark:text-slate-300">Paid</span>
                    </label>
                </div>
                
                <!-- Salary Range Inputs -->
                <div id="salary-range" class="mt-3 {{ request('salary_option') == 'pay' ? '' : 'hidden' }}">
                    <div class="flex gap-3">
                        <input type="number" 
                               name="min_salary" 
                               value="{{ request('min_salary') }}"
                               placeholder="Min" 
                               class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 placeholder-gray-500 dark:placeholder-gray-400 focus:border-transparent">
                    </div>
                        <span class="flex items-center text-slate-500 text-sm my-2 ml-2">To</span>
                    <div class="flex gap-3">
                        <input type="number" 
                               name="max_salary" 
                               value="{{ request('max_salary') }}"
                               placeholder="Max" 
                               class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 placeholder-gray-500 dark:placeholder-gray-400 focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Job Type Filter -->
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                    Job Type
                </h4>
                <div class="space-y-2">
                    @foreach($jobTypes as $type)
                        <label class="flex items-center justify-between p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" 
                                       name="type[]" 
                                       value="{{ $type }}" 
                                       {{ in_array($type, request()->input('type', [])) ? 'checked' : '' }} 
                                       class="rounded text-blue-600 focus:ring-blue-500">
                                <span class="text-slate-700 dark:text-slate-300 capitalize">{{ $type }}</span>
                            </div>
                            <span class="text-xs text-slate-500 dark:text-slate-100 bg-slate-100 dark:bg-slate-600 px-2 py-1 rounded-full">
                                {{ $jobTypeCounts[$type] ?? 0 }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="p-6 border-t border-slate-200 dark:border-slate-700 space-y-3">
            <div class="flex gap-3">
                <button type="submit" class="flex-1 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    Apply Filters
                </button>
                <a href="{{ route('jobs') }}" class="flex-1 px-4 py-2.5 border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 font-medium rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors text-center">
                    Clear
                </a>
            </div>
            <div class="text-center">
                <span class="text-sm text-slate-500 dark:text-slate-400">
                    {{ $posts->total() ?? 0 }} jobs found
                </span>
            </div>
        </div>
    </div>

    
    <!-- Right Content Area (Jobs List) -->
    <div class="flex-1">
        <!-- Mobile Filter Button (only visible on small screens) -->
    <div class="lg:hidden mb-4 flex justify-start h-10">
        <button 
            type="button" 
            onclick="toggleMobileFilters()" 
            class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 ">
            <!-- Filter Icon -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.586V4z"/>
            </svg>
            Filter
        </button>
    </div>

        <!-- Search Bar -->
        <div class="mb-8">
            <div class="relative">
                <input type="text" 
                       name="q"
                       value="{{ request('q') }}"
                       placeholder="Search..." 
                       class="w-full pl-12 lg:pr-32 pr-20 py-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all shadow-sm">
                <div class="absolute left-4 top-1/2 -translate-y-1/2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                
                <!-- Mobile Filter Button -->
                <button type="button" onclick="openMobileFilters()" class="lg:hidden absolute right-20 top-1/2 -translate-y-1/2 p-2 text-slate-500 hover:text-blue-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"/>
                    </svg>
                </button>
                
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    Search
                </button>
            </div>
        </div>

        <!-- Jobs Results -->
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4" id="jobs-results">
            @forelse($posts as $post)
                <x-job-card :post="$post"/>
            @empty
                <div class="col-span-full text-center py-16 text-slate-500 dark:text-slate-400 text-2xl font-semibold">
                    អត់មានទេប្រាដឺ!
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</form>

    <!-- Mobile Filter Modal -->
<div id="mobile-filter-sidebar" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 opacity-0 invisible transition-opacity duration-300">
    <div id="mobile-filter-content" class="fixed top-0 left-0 h-full w-3/4 bg-white dark:bg-slate-800 shadow-lg p-6 overflow-y-auto transform -translate-x-full transition-transform duration-300">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Filters</h3>
            <button type="button" onclick="toggleMobileFilters()" class="p-2 dark:text-white text-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg">
                ✕
            </button>
        </div>

            <!-- Modal Content -->
            <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto scrollbar-none">
                
                <!-- Job Category Filter -->
                <div>
                    <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                        Category
                    </h4>
                    <select name="category_mobile" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Location Filter -->
                <div>
                    <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                        Location
                    </h4>
                    <select name="location_mobile" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        <option value="">All Locations</option>
                        @foreach($locations as $location)
                            <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                                {{ $location }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Salary Filter -->
                <div>
                    <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                        Salary
                    </h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                            <input type="radio" name="salary_option_mobile" value="" {{ request('salary_option') == '' ? 'checked' : '' }} onchange="toggleMobileSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                            <span class="text-slate-700 dark:text-slate-300">All</span>
                        </label>
                        <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                            <input type="radio" name="salary_option_mobile" value="not" {{ request('salary_option') == 'not' ? 'checked' : '' }} onchange="toggleMobileSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                            <span class="text-slate-700 dark:text-slate-300">Unpaid</span>
                        </label>
                        <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                            <input type="radio" name="salary_option_mobile" value="negotiable" {{ request('salary_option') == 'negotiable' ? 'checked' : '' }} onchange="toggleMobileSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                            <span class="text-slate-700 dark:text-slate-300">Negotiable</span>
                        </label>
                        <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                            <input type="radio" name="salary_option_mobile" value="pay" {{ request('salary_option') == 'pay' ? 'checked' : '' }} onchange="toggleMobileSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                            <span class="text-slate-700 dark:text-slate-300">Paid</span>
                        </label>
                    </div>
                    
                    <!-- Salary Range Inputs -->
                    <div id="mobile-salary-range" class="mt-3 {{ request('salary_option') == 'pay' ? '' : 'hidden' }}">
                        <div class="flex">
                            <input type="number" 
                                   name="min_salary_mobile" 
                                   value="{{ request('min_salary') }}"
                                   placeholder="Min" 
                                   class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 placeholder-gray-500 dark:placeholder-gray-400 focus:border-transparent">
                        </div>
                        <span class="flex items-center text-slate-500 text-sm my-2 ml-2">To</span>
                        <div class="flex">
                            <input type="number" 
                                   name="max_salary_mobile" 
                                   value="{{ request('max_salary') }}"
                                   placeholder="Max" 
                                   class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 placeholder-gray-500 dark:placeholder-gray-400 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Job Type Filter -->
                <div>
                    <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                        Job Type
                    </h4>
                    <div class="space-y-2">
                        @foreach($jobTypes as $type)
                            <label class="flex items-center justify-between p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" 
                                           name="type_mobile[]" 
                                           value="{{ $type }}" 
                                           {{ in_array($type, request()->input('type', [])) ? 'checked' : '' }}
                                           class="rounded text-blue-600 focus:ring-blue-500">
                                    <span class="text-slate-700 dark:text-slate-300 capitalize">{{ $type }}</span>
                                </div>
                                <span class="text-xs text-slate-500 bg-slate-100 dark:bg-slate-600 px-2 py-1 rounded-full">
                                    {{ $jobTypeCounts[$type] ?? 0 }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Modal Action Buttons -->
            <div class="p-6 border-t border-slate-200 dark:border-slate-700 space-y-3">
                <div class="flex gap-3">
                    <button type="button" onclick="applyMobileFilters()" class="flex-1 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        Apply Filters
                    </button>
                    <button type="button" onclick="clearMobileFilters()" class="flex-1 px-4 py-2.5 border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 font-medium rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                        Clear
                    </button>
                </div>
                <div class="text-center">
                    <span class="text-sm text-slate-500 dark:text-slate-400">
                        {{ $posts->total() ?? 0 }} jobs found
                    </span>
                </div>
            </div>
        </div>
    </div>


<script>

function toggleMobileFilters() {
    const sidebar = document.getElementById('mobile-filter-sidebar');
    const content = document.getElementById('mobile-filter-content');

    if (sidebar.classList.contains('invisible')) {
        // Open sidebar
        sidebar.classList.remove('invisible');
        setTimeout(() => {
            sidebar.classList.remove('opacity-0');
            content.classList.remove('-translate-x-full');
        }, 50);
    } else {
        // Close sidebar
        sidebar.classList.add('opacity-0');
        content.classList.add('-translate-x-full');
        setTimeout(() => {
            sidebar.classList.add('invisible');
        }, 300); // matches transition duration
    }
}

    // ✅ Salary toggle
 function toggleSalaryRange() {
        const salaryRange = document.getElementById('salary-range');
        const payOption = document.querySelector('input[name="salary_option"][value="pay"]');
        
        if (payOption.checked) {
            salaryRange.classList.remove('hidden');
        } else {
            salaryRange.classList.add('hidden');
            document.querySelector('input[name="min_salary"]').value = '';
            document.querySelector('input[name="max_salary"]').value = '';
        }
    }

    // ✅ Mobile salary toggle
    function toggleMobileSalaryRange() {
        const salaryRange = document.getElementById('mobile-salary-range');
        const payOption = document.querySelector('input[name="salary_option_mobile"][value="pay"]');
        
        if (payOption.checked) {
            salaryRange.classList.remove('hidden');
        } else {
            salaryRange.classList.add('hidden');
            document.querySelector('input[name="min_salary_mobile"]').value = '';
            document.querySelector('input[name="max_salary_mobile"]').value = '';
        }
    }

    // ✅ Apply filters from mobile → copy values into desktop filters → submit
    function applyMobileFilters() {
        // Copy dropdowns
        document.querySelector('select[name="category"]').value = 
            document.querySelector('select[name="category_mobile"]').value;

        document.querySelector('select[name="location"]').value = 
            document.querySelector('select[name="location_mobile"]').value;

        // Salary option
        let mobileSalary = document.querySelector('input[name="salary_option_mobile"]:checked');
        if (mobileSalary) {
            let desktopSalary = document.querySelector('input[name="salary_option"][value="' + mobileSalary.value + '"]');
            if (desktopSalary) desktopSalary.checked = true;
        }

        // Min / max salary
        document.querySelector('input[name="min_salary"]').value = 
            document.querySelector('input[name="min_salary_mobile"]').value;
        document.querySelector('input[name="max_salary"]').value = 
            document.querySelector('input[name="max_salary_mobile"]').value;

        // Job type checkboxes
        document.querySelectorAll('input[name="type[]"]').forEach(el => el.checked = false);
        document.querySelectorAll('input[name="type_mobile[]"]:checked').forEach(el => {
            let match = document.querySelector('input[name="type[]"][value="' + el.value + '"]');
            if (match) match.checked = true;
        });

        // Skills checkboxes
        document.querySelectorAll('input[name="skills[]"]').forEach(el => el.checked = false);
        document.querySelectorAll('input[name="skills_mobile[]"]:checked').forEach(el => {
            let match = document.querySelector('input[name="skills[]"][value="' + el.value + '"]');
            if (match) match.checked = true;
        });

        // Submit the real form
        document.getElementById('filter-form').submit();
    }

    // ✅ Clear all mobile filters
    function clearMobileFilters() {
        document.querySelector('select[name="category_mobile"]').value = "";
        document.querySelector('select[name="location_mobile"]').value = "";
        document.querySelectorAll('input[name="salary_option_mobile"]').forEach(el => el.checked = false);
        document.querySelectorAll('input[name="type_mobile[]"]').forEach(el => el.checked = false);
        document.querySelectorAll('input[name="skills_mobile[]"]').forEach(el => el.checked = false);
        document.querySelector('input[name="min_salary_mobile"]').value = "";
        document.querySelector('input[name="max_salary_mobile"]').value = "";
    }
</script>

<style>
    /* Hide scrollbars completely */
    .scrollbar-none {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .scrollbar-none::-webkit-scrollbar {
        display: none;
    }
    
    /* Smooth focus transitions */
    input:focus, select:focus {
        outline: none;
    }
    
    /* Clean checkbox and radio styling */
    input[type="checkbox"], input[type="radio"] {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }
</style>