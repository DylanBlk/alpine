<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">➕ Ajouter une nouvelle tâche</h2>
    <form @submit.prevent="addTask" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="taskTitle" class="block text-sm font-medium text-gray-700 mb-2">
                    Titre *
                </label>
                <input 
                    type="text" 
                    id="taskTitle"
                    x-model="newTask.title"
                    x-ref="titleInput"
                    required
                    placeholder="Ex: Finir le rapport"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                >
            </div>
            <div>
                <label for="taskStatus" class="block text-sm font-medium text-gray-700 mb-2">
                    Statut
                </label>
                <select 
                    id="taskStatus"
                    x-model="newTask.status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                >
                    <option value="todo">À faire</option>
                    <option value="inprogress">En cours</option>
                    <option value="done">Terminé</option>
                </select>
            </div>
        </div>
        <div>
            <label for="taskDesc" class="block text-sm font-medium text-gray-700 mb-2">
                Description *
            </label>
            <textarea 
                id="taskDesc"
                x-model="newTask.description"
                required
                rows="3"
                placeholder="Décrivez la tâche..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
            ></textarea>
        </div>
        <button 
            type="submit"
            class="w-full md:w-auto px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors duration-200"
        >
            ➕ Ajouter la tâche
        </button>
    </form>
</div>
