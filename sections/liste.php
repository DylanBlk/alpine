div class="space-y-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">📝 Mes tâches</h2>
    
    <template x-if="filteredTasks.length === 0">
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <div class="text-6xl mb-4">📭</div>
            <p class="text-gray-600 text-lg" x-text="tasks.length === 0 ? 'Aucune tâche pour le moment' : 'Aucune tâche ne correspond à votre recherche'"></p>
        </div>
    </template>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <template x-for="task in filteredTasks" :key="task.id">
            <div 
                class="bg-white rounded-lg shadow-md p-5 hover:shadow-lg transition-shadow duration-200"
                x-show="true"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
            >
                <div class="flex justify-between items-start mb-3">
                    <span 
                        class="px-3 py-1 rounded-full text-xs font-medium"
                        :class="{
                            'bg-yellow-100 text-yellow-800': task.status === 'todo',
                            'bg-blue-100 text-blue-800': task.status === 'inprogress',
                            'bg-green-100 text-green-800': task.status === 'done'
                        }"
                    >
                        <span x-show="task.status === 'todo'">⏳ À faire</span>
                        <span x-show="task.status === 'inprogress'">🔄 En cours</span>
                        <span x-show="task.status === 'done'">✅ Terminé</span>
                    </span>
                    <span class="text-xs text-gray-400">#<span x-text="task.id"></span></span>
                </div>

                <template x-if="editingTaskId !== task.id">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2" x-text="task.title"></h3>
                        <p class="text-gray-600 text-sm mb-4" x-text="task.description"></p>
                        
                        <div class="flex flex-wrap gap-2">
                            <button 
                                @click="startEdit(task)"
                                class="flex-1 px-3 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition-colors duration-200"
                            >
                                ✏️ Modifier
                            </button>
                            <button 
                                @click="confirmDelete(task.id)"
                                class="flex-1 px-3 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition-colors duration-200"
                            >
                                🗑️ Supprimer
                            </button>
                        </div>
                    </div>
                </template>

                <template x-if="editingTaskId === task.id">
                    <div>
                        <input 
                            type="text" 
                            x-model="editingTask.title"
                            class="w-full px-3 py-2 border border-gray-300 rounded mb-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="Titre"
                        >
                        <textarea 
                            x-model="editingTask.description"
                            rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded mb-2 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="Description"
                        ></textarea>
                        <select 
                            x-model="editingTask.status"
                            class="w-full px-3 py-2 border border-gray-300 rounded mb-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        >
                            <option value="todo">À faire</option>
                            <option value="inprogress">En cours</option>
                            <option value="done">Terminé</option>
                        </select>
                        
                        <div class="flex gap-2">
                            <button 
                                @click="saveEdit()"
                                class="flex-1 px-3 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition-colors duration-200"
                            >
                                💾 Enregistrer
                            </button>
                            <button 
                                @click="cancelEdit()"
                                class="flex-1 px-3 py-2 bg-gray-500 text-white text-sm rounded hover:bg-gray-600 transition-colors duration-200"
                            >
                                ❌ Annuler
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>
</div>
