<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                🔍 Rechercher une tâche
            </label>
            <input 
                type="text" 
                id="search"
                x-model="searchQuery"
                placeholder="Rechercher par titre..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
            >
        </div>

        <div>
            <label for="filter" class="block text-sm font-medium text-gray-700 mb-2">
                🏷️ Filtrer par statut
            </label>
            <select 
                id="filter"
                x-model="statusFilter"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
            >
                <option value="all">Tous</option>
                <option value="todo">À faire</option>
                <option value="inprogress">En cours</option>
                <option value="done">Terminé</option>
            </select>
        </div>
    </div>
</div>
