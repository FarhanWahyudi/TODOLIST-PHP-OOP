<?php
    require_once __DIR__ . '/Repository/TodoListRepository.php';
    require_once __DIR__ . '/Service/TodoListService.php';
    require_once __DIR__ . '/View/TodoListView.php';
    require_once __DIR__ . '/Entity/TodoList.php';
    require_once __DIR__ . '/Config/Database.php';

    use View\TodoListView;
    use Service\TodoListServiceImpl;
    use Repository\TodoListRepositoryImpl;

    $connection = \Config\Database::getConnection();
    $todoListRepository = new TodoListRepositoryImpl($connection);
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListView->showTodoList();
?>