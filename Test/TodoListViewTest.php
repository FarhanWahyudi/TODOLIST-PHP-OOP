<?php
    require_once __DIR__ . '/../Repository/TodoListRepository.php';
    require_once __DIR__ . '/../Service/TodoListService.php';
    require_once __DIR__ . '/../View/TodoListView.php';
    require_once __DIR__ . '/../Entity/TodoList.php';

    use Entity\TodoList;
    use View\TodoListView;
    use Service\TodoListServiceImpl;
    use Repository\TodoListRepositoryImpl;

    function testViewTodolist() {
        $todoListRepository = new TodoListRepositoryImpl();
        $todoListService = new TodoListServiceImpl($todoListRepository);
        $todoListView = new TodoListView($todoListService);

        $todoListService->addTodoList('farhan');
        $todoListService->addTodoList('wahyu');
        $todoListService->addTodoList('yudi');

        $todoListView->showTodoList();
    }

    testViewTodolist()
?>