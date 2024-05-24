<?php
    require_once __DIR__ . '/../Entity/TodoList.php';
    require_once __DIR__ . '/../Repository/TodoListRepository.php';
    require_once __DIR__ . '/../Service/TodoListService.php';
    require_once __DIR__ . '/../Config/Database.php';

    use Repository\TodoListRepositoryImpl;
    use Service\TodoListServiceImpl;
    use Entity\TodoList;

    function testShowTodoList() {
        $connection = \Config\Database::getConnection();
        $todoListRepository = new TodoListRepositoryImpl($connection);

        $todoListService = new TodoListServiceImpl($todoListRepository);
        $todoListService->addTodoList('php dasar');
        $todoListService->addTodoList('php oop');
        $todoListService->addTodoList('php database');
        $todoListService->showTodoList();
    }

    testShowTodoList();

    function testAddTodoList() {
        $connection = \Config\Database::getConnection();
        $todoListRepository = new TodoListRepositoryImpl($connection);

        $todoListService = new TodoListServiceImpl($todoListRepository);
        $todoListService->addTodoList('php dasar');
        $todoListService->addTodoList('php oop');
        $todoListService->addTodoList('php database');

        // $todoListService->showTodoList();
    }

    // testAddTodoList();

    function testRemoveTodoList() {
        $connection = \Config\Database::getConnection();
        $todoListRepository = new TodoListRepositoryImpl($connection);

        $todoListService = new TodoListServiceImpl($todoListRepository);
        $todoListService->RemoveTodoList(5);
        $todoListService->RemoveTodoList(4);
        $todoListService->RemoveTodoList(3);
        $todoListService->RemoveTodoList(2);
        $todoListService->RemoveTodoList(1);
    }

    // testRemoveTodoList();
    
?>