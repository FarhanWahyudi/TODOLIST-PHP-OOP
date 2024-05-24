<?php
    namespace Repository;
    
    use Entity\TodoList;

    interface TodoListRepository {

        function save(TodoList $todoList): void;

        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodoListRepositoryImpl implements TodoListRepository {
        public array $todoList = [];
        private \PDO $connection;

        public function __construct(\PDO $connection) {
            $this->connection = $connection;
        }

        function save(TodoList $todoList): void {
            // $number = sizeof($this->todoList) + 1;
            // $this->todoList[$number] = $todoList;

            $sql = 'insert into todolist (todo) values (?)';
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todoList->getTodo()]);
        }

        function remove(int $number): bool {
            // if($number > sizeof($this->todoList) || $number <= 0) {
            //     return false;
            // }
    
            // for ($i = $number; $i < sizeof($this->todoList); $i++) {
            //     $this->todoList[$i] = $this->todoList[$i + 1];
            // };
    
            // unset($this->todoList[sizeof($this->todoList)]);
    
            // return true;

            $sql = 'select id from todolist where id = ?';
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                $sql = 'delete from todolist where id = ?';
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                return false;
            }
        }

        function findAll(): array {
            // return $this->todoList;

            $sql = 'select id, todo from todolist';
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach($statement as $row) {
                $todoList = new TodoList();
                $todoList->setId($row['id']);
                $todoList->setTodo($row['todo']);

                $result[] = $todoList;
            }

            return $result;
        }
    }
?>