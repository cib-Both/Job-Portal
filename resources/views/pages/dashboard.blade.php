<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome, ' . auth()->user()->name) }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 rounded-xl flex items-start space-x-3">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm text-green-800 dark:text-green-200">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 border border-red-200 dark:border-red-800 rounded-xl flex items-start space-x-3">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm text-red-800 dark:text-red-200">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Widgets -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
                <!-- Total Applications -->
                <x-widget 
                    title="Total Applications" 
                    :value="$stats['total']" 
                    color="blue"
                    :icon="'<svg class=\'w-7 h-7 text-white\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'>
                        <path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'/>
                    </svg>'"
                />

                <!-- Applied -->
                <x-widget 
                    title="Applied" 
                    :value="$stats['applied']" 
                    color="indigo"
                    :icon="'<svg class=\'w-7 h-7 text-white\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'>
                        <path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z\'/>
                    </svg>'"
                />

                <!-- Interviewed -->
                <x-widget 
                    title="Interviewed" 
                    :value="$stats['interviewed']" 
                    color="yellow"
                    :icon="'<svg class=\'w-7 h-7 text-white\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'>
                        <path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z\'/>
                    </svg>'"
                />

                <!-- Offered -->
                <x-widget 
                    title="Offered" 
                    :value="$stats['offered']" 
                    color="green"
                    :icon="'<svg class=\'w-7 h-7 text-white\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'>
                        <path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z\'/>
                    </svg>'"
                />
            </div>

            <!-- Applications Table -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="p-6 mb-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">My Applications</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Track all your job applications</p>
                        </div>
                        
                        <!-- Filters -->
                        <div class="flex flex-col sm:flex-row gap-3">
                            <!-- Search -->
                            <form method="GET" action="{{ route('dashboard') }}" class="flex-1 sm:flex-none">
                                <input type="hidden" name="status" value="{{ $status ?? 'all' }}">
                                <div class="relative">
                                    <input type="text" 
                                           name="search" 
                                           value="{{ $search ?? '' }}"
                                           placeholder="Search jobs or companies..."
                                           class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </form>

                            <!-- Custom Status Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" 
                                        type="button"
                                        class="w-full sm:w-auto inline-flex items-center justify-between px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm transition-colors min-w-[180px]">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                        </svg>
                                        @if(($status ?? 'all') == 'all')
                                            All Status
                                        @else
                                            {{ ucfirst($status) }}
                                        @endif
                                    </span>
                                    <svg class="w-4 h-4 ml-2" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div x-show="open" 
                                     @click.away="open = false"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 transform scale-95"
                                     x-transition:enter-end="opacity-100 transform scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 transform scale-100"
                                     x-transition:leave-end="opacity-0 transform scale-95"
                                     class="absolute right-0 mt-2 w-56 rounded-lg shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 z-10"
                                     style="display: none;">
                                    <div class="py-1">
                                        <a href="{{ route('dashboard', ['search' => $search ?? '']) }}" 
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ ($status ?? 'all') == 'all' ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : '' }}">
                                            All Status
                                            @if(($status ?? 'all') == 'all')
                                                <svg class="w-4 h-4 ml-auto text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                        </a>
                                        <a href="{{ route('dashboard', ['status' => 'applied', 'search' => $search ?? '']) }}" 
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ ($status ?? '') == 'applied' ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300' : '' }}">
                                           
                                            Applied
                                            @if(($status ?? '') == 'applied')
                                                <svg class="w-4 h-4 ml-auto text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                        </a>
                                        <a href="{{ route('dashboard', ['status' => 'interviewed', 'search' => $search ?? '']) }}" 
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ ($status ?? '') == 'interviewed' ? 'bg-yellow-50 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-300' : '' }}">
                                            
                                            Interviewed
                                            @if(($status ?? '') == 'interviewed')
                                                <svg class="w-4 h-4 ml-auto text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                        </a>
                                        <a href="{{ route('dashboard', ['status' => 'offered', 'search' => $search ?? '']) }}" 
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ ($status ?? '') == 'offered' ? 'bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-300' : '' }}">
                                            
                                            Offered
                                            @if(($status ?? '') == 'offered')
                                                <svg class="w-4 h-4 ml-auto text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                        </a>
                                        <a href="{{ route('dashboard', ['status' => 'rejected', 'search' => $search ?? '']) }}" 
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ ($status ?? '') == 'rejected' ? 'bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300' : '' }}">
                                            
                                            Rejected
                                            @if(($status ?? '') == 'rejected')
                                                <svg class="w-4 h-4 ml-auto text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Job Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Company</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Applied Date</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($applications as $application)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $application->job->title ?? 'N/A' }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $application->job->category->name ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($application->job->company->logo ?? false)
                                                <img src="{{ asset('storage/' . $application->job->company->logo) }}" 
                                                     alt="{{ $application->job->company->name }}" 
                                                     class="w-8 h-8 rounded-full mr-3 object-cover">
                                            @endif
                                            <span class="text-sm text-gray-900 dark:text-white">
                                                {{ $application->job->company->name ?? 'N/A' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusColors = [
                                                'applied' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
                                                'interviewed' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300',
                                                'offered' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                                                'rejected' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
                                            ];
                                            $statusColor = $statusColors[$application->status] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                                        @endphp
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                        {{ $application->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('jobs.detail', $application->job->posts->first()->id ?? '#') }}" 
                                               class="inline-flex items-center justify-center w-8 h-8 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors"
                                               title="View Job">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <!-- Delete Button -->
                                            <form id="deleteApplicationForm{{ $application->id }}" action="{{ route('application.destroy', $application->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        onclick="openDeleteModal({{ $application->id }})"
                                                        class="inline-flex items-center justify-center w-8 h-8 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                                                        title="Delete Application">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">No applications found</p>
                                            <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Start applying to jobs to see them here</p>
                                            <a href="{{ route('jobs') }}" 
                                               class="mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                                                Browse Jobs
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($applications->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $applications->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-delete-confirm-modal 
        id="deleteApplicationModal"
        title="Delete Application?"
        message="Are you sure you want to delete this application? This action cannot be undone."
        confirmText="Yes, Delete"
        cancelText="Cancel"
    />

    <script>
        let currentApplicationId = null;

        function openDeleteModal(applicationId) {
            currentApplicationId = applicationId;
            const modal = document.getElementById('deleteApplicationModal');
            if (modal) {
                modal.dataset.formId = 'deleteApplicationForm' + applicationId;
                openModal('deleteApplicationModal');
            }
        }
    </script>
</x-app-layout>