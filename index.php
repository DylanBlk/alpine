<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Trello - Gestion de tâches</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    
    <div class="container mx-auto px-4 py-8" x-data="taskManager">
        
        <?php include 'sections/header.php'; ?>
        
        <?php include 'sections/filtres.php'; ?>
        
        <?php include 'sections/status.php'; ?>
        
        <?php include 'sections/formulaire.php'; ?>
        
        <?php include 'sections/liste.php'; ?>
        
        <?php include 'sections/confirmation.php'; ?>

    </div>

    <script>
        document.addEventListener('alpine:init', function() {
            Alpine.data('taskManager', function() {
                return {
                    tasks: Alpine.$persist([]).as('trello-tasks'),
                    nextId: Alpine.$persist(1).as('trello-id'),
                    newTask: { title: '', description: '', status: 'todo' },
                    searchQuery: '',
                    statusFilter: 'all',
                    editingTaskId: null,
                    editingTask: {},
                    showDeleteModal: false,
                    taskToDelete: null,

                    init() {
                        this.$watch('tasks', () => {
                            console.log('Tâches:', this.tasks.length);
                        });
                    },

                    get filteredTasks() {
                        var filtered = this.tasks;
                        
                        if (this.statusFilter != 'all') {
                            filtered = filtered.filter(function(task) {
                                return task.status === this.statusFilter;
                            }.bind(this));
                        }

                        if (this.searchQuery.trim() != '') {
                            var search = this.searchQuery.toLowerCase();
                            filtered = filtered.filter(function(task) {
                                return task.title.toLowerCase().includes(search) || 
                                       task.description.toLowerCase().includes(search);
                            });
                        }

                        return filtered;
                    },

                    addTask() {
                        if (this.newTask.title.trim() == '' || this.newTask.description.trim() == '') {
                            alert('Titre et description requis');
                            return;
                        }

                        var task = {
                            id: this.nextId++,
                            title: this.newTask.title.trim(),
                            description: this.newTask.description.trim(),
                            status: this.newTask.status,
                            createdAt: new Date().toISOString()
                        };
                        
                        this.tasks.push(task);
                        this.newTask.title = '';
                        this.newTask.description = '';
                        this.newTask.status = 'todo';
                        
                        this.$nextTick(() => {
                            this.$refs.titleInput.focus();
                        });
                    },

                    startEdit(task) {
                        this.editingTaskId = task.id;
                        this.editingTask = {
                            id: task.id,
                            title: task.title,
                            description: task.description,
                            status: task.status
                        };
                    },

                    saveEdit() {
                        if (this.editingTask.title.trim() == '' || this.editingTask.description.trim() == '') {
                            alert('Titre et description requis');
                            return;
                        }

                        for (var i = 0; i < this.tasks.length; i++) {
                            if (this.tasks[i].id === this.editingTaskId) {
                                this.tasks[i].title = this.editingTask.title.trim();
                                this.tasks[i].description = this.editingTask.description.trim();
                                this.tasks[i].status = this.editingTask.status;
                                break;
                            }
                        }

                        this.editingTaskId = null;
                        this.editingTask = {};
                    },

                    cancelEdit() {
                        this.editingTaskId = null;
                        this.editingTask = {};
                    },

                    confirmDelete(id) {
                        this.taskToDelete = id;
                        this.showDeleteModal = true;
                    },

                    deleteTask() {
                        if (this.taskToDelete) {
                            this.tasks = this.tasks.filter(function(t) {
                                return t.id !== this.taskToDelete;
                            }.bind(this));
                            this.taskToDelete = null;
                        }
                        this.showDeleteModal = false;
                    },

                    getTasksByStatus(status) {
                        var count = 0;
                        for (var i = 0; i < this.tasks.length; i++) {
                            if (this.tasks[i].status === status) {
                                count++;
                            }
                        }
                        return count;
                    }
                }
            });
        });
    </script>

</body>
</html>