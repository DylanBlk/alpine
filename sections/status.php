<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow-md p-4 text-center">
        <div class="text-3xl font-bold text-indigo-600" x-text="tasks.length"></div>
        <div class="text-sm text-gray-600">Total</div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-4 text-center">
        <div class="text-3xl font-bold text-yellow-600" x-text="getTasksByStatus('todo')"></div>
        <div class="text-sm text-gray-600">À faire</div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-4 text-center">
        <div class="text-3xl font-bold text-blue-600" x-text="getTasksByStatus('inprogress')"></div>
        <div class="text-sm text-gray-600">En cours</div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-4 text-center">
        <div class="text-3xl font-bold text-green-600" x-text="getTasksByStatus('done')"></div>
        <div class="text-sm text-gray-600">Terminés</div>
    </div>
</div>
