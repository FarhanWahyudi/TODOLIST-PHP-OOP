<?php
    require_once __DIR__ . '/../Entity/TodoList.php';
    require_once __DIR__ . '/../Repository/TodoListRepository.php';
    require_once __DIR__ . '/../Service/TodoListService.php';

    use Repository\TodoListRepositoryImpl;
    use Service\TodoListServiceImpl;
    use Entity\TodoList;

    function testShowTodoList() {
        $todoListRepository = new TodoListRepositoryImpl();
        $todoListRepository->todoList[1] = new TodoList('php dasar');
        $todoListRepository->todoList[2] = new TodoList('php oop');
        $todoListRepository->todoList[3] = new TodoList('php database');

        $todoListService = new TodoListServiceImpl($todoListRepository);
        $todoListService->showTodoList();
    }

    // testShowTodoList();

    function testAddTodoList() {
        $todoListRepository = new TodoListRepositoryImpl();
        $todoListService = new TodoListServiceImpl($todoListRepository);

        $todoListService->addTodoList('php dasar');
        $todoListService->addTodoList('php oop');
        $todoListService->addTodoList('php database');

        $todoListService->showTodoList();
    }

    // testAddTodoList();

    function testRemoveTodoList() {
        $todoListRepository = new TodoListRepositoryImpl();
        $todoListService = new TodoListServiceImpl($todoListRepository);
        $todoListService->addTodoList('php dasar');
        $todoListService->addTodoList('php oop');
        $todoListService->addTodoList('php database');

        $todoListService->RemoveTodoList(2);
        $todoListService->RemoveTodoList(4);

        $todoListService->showTodoList();
    }

    testRemoveTodoList();
    
?>