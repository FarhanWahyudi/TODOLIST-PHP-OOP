<?php
    namespace View;

    require_once __DIR__ . '/../Helper/InputHelper.php';

    use Service\TodoListService;
    use Helper\InputHelper;

    class TodoListView {
        private TodoListService $todoListService;

        public function __construct(TodoListService $todoListService) {
            $this->todoListService = $todoListService;
        }
        
        function showTodoList(): void {
            while(true) {
               $this->todoListService->showTodoList();
    
                echo 'MENU:' . PHP_EOL;
                echo '1. TAMBAH TODO' . PHP_EOL;
                echo '2. HAPUS TODO' . PHP_EOL;
                echo 'X. KELUAR' . PHP_EOL;
    
                $pilihan = InputHelper::input('Pilih');
    
                if($pilihan == '1') {
                    $this->addTodoList();
                } elseif($pilihan == '2') {
                    $this->removeTodoList();
                } elseif($pilihan == 'x') {
                    break;
                } else {
                    echo 'Pilihan Tidak Dimengerti' . PHP_EOL;
                };
            }
        }
        
        function addTodoList(): void {
            echo 'MENAMBAHKAN TODO' . PHP_EOL;

            $todo = InputHelper::input('Todo(x untuk batal)');
            if($todo == 'x') {
                echo 'Batal Menambahkan Todo' . PHP_EOL;
            } else {
                $this->todoListService->addTodoList($todo);
            };
        }

        function removeTodoList(): void {
            echo 'MENGHAPUS TODO' . PHP_EOL;

            $pilihan = InputHelper::input('Nomor(x Untuk Membatalkan)');

            if($pilihan == 'x') {
                echo 'Batal Menghapus Todo' . PHP_EOL;
            } else {
                $this->todoListService->removeTodoList($pilihan);
            };
        }
    }
?>