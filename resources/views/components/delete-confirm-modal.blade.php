@props(['id' => 'deleteModal', 'title' => 'Confirm Deletion', 'message' => 'Are you sure you want to delete this item?', 'confirmText' => 'Delete', 'cancelText' => 'Cancel'])

<!-- Modal Overlay -->
<div id="{{ $id }}" 
     class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-70 overflow-y-auto h-full w-full z-50"
     style="display: none;">
    
    <!-- Modal Content -->
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-2xl rounded-2xl bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700 animate-modal-show">
        
        <div class="text-center">
            <!-- Icon -->
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 dark:bg-red-900/30 mb-4">
                <svg class="h-8 w-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <!-- Title -->
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                {{ $title }}
            </h3>
            
            <!-- Message -->
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                {{ $message }}
            </p>
            
            <!-- Buttons -->
            <div class="flex items-center justify-center space-x-3">
                <button type="button" 
                        onclick="closeModal('{{ $id }}')"
                        class="px-5 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                    {{ $cancelText }}
                </button>
                <button type="button" 
                        onclick="confirmDelete('{{ $id }}')"
                        class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                    {{ $confirmText }}
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes modalShow {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .animate-modal-show {
        animation: modalShow 0.3s ease-out;
    }
</style>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'block';
            modal.classList.remove('hidden');
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
            // Restore body scroll
            document.body.style.overflow = 'auto';
        }
    }

    function confirmDelete(modalId) {
        const modal = document.getElementById(modalId);
        if (modal && modal.dataset.formId) {
            const form = document.getElementById(modal.dataset.formId);
            if (form) {
                form.submit();
            }
        }
        closeModal(modalId);
    }

    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
        const modals = document.querySelectorAll('[id$="Modal"]');
        modals.forEach(modal => {
            if (event.target === modal) {
                closeModal(modal.id);
            }
        });
    });

    // Close modal on ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modals = document.querySelectorAll('[id$="Modal"]');
            modals.forEach(modal => {
                if (!modal.classList.contains('hidden')) {
                    closeModal(modal.id);
                }
            });
        }
    });
</script>