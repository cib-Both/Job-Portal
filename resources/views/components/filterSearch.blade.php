@props(['posts', 'categories', 'locations', 'skills', 'jobTypes'])

<!-- Main Container -->
<form method="GET" action="{{ route('jobs') }}" id="filter-form" class="flex gap-6">

    <!-- Left Sidebar Filters -->
    <div class="w-80 bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 h-fit sticky top-6 scrollbar-none">
        
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
                        <span class="text-slate-700 dark:text-slate-300">Any Salary</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                        <input type="radio" name="salary_option" value="pay" {{ request('salary_option') == 'pay' ? 'checked' : '' }} onchange="toggleSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700 dark:text-slate-300">Paid</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                        <input type="radio" name="salary_option" value="not" {{ request('salary_option') == 'not' ? 'checked' : '' }} onchange="toggleSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700 dark:text-slate-300">Unpaid</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors">
                        <input type="radio" name="salary_option" value="negotiable" {{ request('salary_option') == 'negotiable' ? 'checked' : '' }} onchange="toggleSalaryRange()" class="text-blue-600 focus:ring-blue-500">
                        <span class="text-slate-700 dark:text-slate-300">Negotiable</span>
                    </label>
                </div>
                
                <!-- Salary Range Inputs -->
                <div id="salary-range" class="mt-3 {{ request('salary_option') == 'pay' ? '' : 'hidden' }}">
                    <div class="flex gap-3">
                        <input type="number" 
                               name="min_salary" 
                               value="{{ request('min_salary') }}"
                               placeholder="Min" 
                               class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="flex items-center text-slate-500 text-sm">to</span>
                        <input type="number" 
                               name="max_salary" 
                               value="{{ request('max_salary') }}"
                               placeholder="Max" 
                               class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                            <span class="text-xs text-slate-500 bg-slate-100 dark:bg-slate-600 px-2 py-1 rounded-full">
                                {{ $jobTypeCounts[$type] ?? 0 }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Skills Filter -->
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                    Skills
                </h4>
                
                <!-- Skills Search -->
                <div class="relative mb-3">
                    <input type="text" 
                           id="skill-search"
                           placeholder="Search skills..." 
                           class="w-full px-3 py-2 pr-8 text-sm rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <div class="absolute right-2.5 top-1/2 -translate-y-1/2">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <!-- Skills List -->
                <div class="space-y-1 max-h-48 overflow-y-auto scrollbar-none" id="skills-list">
                    @foreach($skills as $skill)
                        <label class="skill-item flex items-center justify-between p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors" data-skill="{{ strtolower($skill) }}">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" 
                                       name="skills[]" 
                                       value="{{ $skill }}" 
                                       {{ in_array($skill, request()->input('skills', [])) ? 'checked' : '' }} 
                                       class="rounded text-blue-600 focus:ring-blue-500">
                                <span class="text-slate-700 dark:text-slate-300 text-sm">{{ $skill }}</span>
                            </div>
                            <span class="text-xs text-slate-500 bg-slate-100 dark:bg-slate-600 px-2 py-1 rounded-full">
                                {{ $skillCounts[$skill] ?? 0 }}
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
        <!-- Search Bar -->
        <div class="mb-8">
            <div class="relative">
                <input type="text" 
                       name="q"
                       value="{{ request('q') }}"
                       placeholder="Search jobs, companies, skills..." 
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
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" id="jobs-results">
            @foreach($posts as $post)
                <x-job-card :post="$post"/>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

    <!-- Mobile Filter Modal -->
    <div id="mobile-filter-modal" class="lg:hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 opacity-0 invisible transition-all duration-300">
        <div class="fixed bottom-0 left-0 right-0 bg-white dark:bg-slate-800 rounded-t-2xl shadow-2xl transform translate-y-full transition-transform duration-300" id="mobile-filter-content">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-slate-200 dark:border-slate-700">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                    Filters
                </h3>
                <button type="button" onclick="closeMobileFilters()" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
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
                            <span class="text-slate-700 dark:text-slate-300">Any Salary</span>
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
                                   class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <span class="flex items-center text-slate-500 text-sm my-2">to</span>
                        <div class="flex">
                            <input type="number" 
                                   name="max_salary_mobile" 
                                   value="{{ request('max_salary') }}"
                                   placeholder="Max" 
                                   class="flex-1 px-3 py-2 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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

                <!-- Skills Filter -->
                <div>
                    <h4 class="font-medium text-slate-900 dark:text-white mb-3">
                        Skills
                    </h4>
                    
                    <!-- Skills Search -->
                    <div class="relative mb-3">
                        <input type="text" 
                               id="mobile-skill-search"
                               placeholder="Search skills..." 
                               class="w-full px-3 py-2 pr-8 text-sm rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="absolute right-2.5 top-1/2 -translate-y-1/2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Skills List -->
                    <div class="space-y-1 max-h-48 overflow-y-auto scrollbar-none" id="mobile-skills-list">
                        @foreach($skills as $skill)
                            <label class="mobile-skill-item flex items-center justify-between p-2.5 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-lg cursor-pointer transition-colors" data-skill="{{ strtolower($skill) }}">
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" 
                                           name="skills_mobile[]" 
                                           value="{{ $skill }}" 
                                           {{ in_array($skill, request()->input('skills', [])) ? 'checked' : '' }}
                                           class="rounded text-blue-600 focus:ring-blue-500">
                                    <span class="text-slate-700 dark:text-slate-300 text-sm">{{ $skill }}</span>
                                </div>
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
</form>

<script>
function openMobileFilters() {
    const modal = document.getElementById('mobile-filter-modal');
    const content = document.getElementById('mobile-filter-content');

    modal.classList.remove('invisible', 'opacity-0');
    setTimeout(() => {
        content.classList.remove('translate-y-full');
    }, 50);
}

function closeMobileFilters() {
    const modal = document.getElementById('mobile-filter-modal');
    const content = document.getElementById('mobile-filter-content');

    content.classList.add('translate-y-full');
    setTimeout(() => {
        modal.classList.add('opacity-0', 'invisible');
    }, 300);
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

    // ✅ Skills search filter
    function filterSkills(inputId, listId) {
        const input = document.getElementById(inputId).value.toLowerCase();
        const items = document.querySelectorAll(`#${listId} li`);
        
        items.forEach(item => {
            const skill = item.getAttribute('data-skill').toLowerCase();
            if (skill.includes(input)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
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