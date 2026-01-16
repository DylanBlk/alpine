<div 
    x-show="showDeleteModal"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
    @click.self="showDeleteModal = false"
>
    <div 
        class="bg-white rounded-lg p-6 max-w-md w-full"
        x-show="showDeleteModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
    >
        <h3 class="text-xl font-bold text-gray-800 mb-4">⚠️ Confirmer la suppression</h3>
        <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer cette tâche ? Cette action est irréversible.</p>
        <div class="flex gap-3">
            <button 
                @click="deleteTask()"
                class="flex-1 px-4 py-2 bg-red-500 text-white font-medium rounded hover:bg-red-600 transition-colors duration-200"
            >
                Oui, supprimer
            </button>
            <button 
                @click="showDeleteModal = false"
                class="flex-1 px-4 py-2 bg-gray-300 text-gray-700 font-medium rounded hover:bg-gray-400 transition-colors duration-200"
            >
                Annuler
            </button>
        </div>
    </div>
</div>
