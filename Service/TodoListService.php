<?php
    namespace Service;

    use Entity\TodoList;
    use Repository\TodoListRepository;
    use Repository\TodoListRepositoryImpl;

    interface TodoListService {
        function showTodoList(): void;

        function addTodoList(string $todo): void;

        function removeTodoList(int $number): void;
    }

    class TodoListServiceImpl implements TodoListService {
        public TodolistRepository $todoListRepository;

        function __construct(TodoListRepository $todoListRepository) {
            $this->todoListRepository = $todoListRepository;
        }

        function showTodoList(): void {
            echo 'TodoList' . PHP_EOL;
            $todoList = $this->todoListRepository->findAll();

            foreach ($todoList as $number => $value) {
                echo $value->getId() . ". " . $value->getTodo() . PHP_EOL;
            };
        }

        function addTodoList(string $todo): void {
            $todoList = new TodoList($todo);
            $this->todoListRepository->save($todoList);
            echo 'Sukses Menambah TodoList' . PHP_EOL;
        }

        function removeTodoList(int $number): void {
            if($this->todoListRepository->remove($number)) {
                echo 'sukses' . PHP_EOL;
            } else {
                echo 'gagal' . PHP_EOL;
            }
        }
    }
?>