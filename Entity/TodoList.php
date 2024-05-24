<?php
    namespace Entity;

    class TodoList {
        private string $todo;
        private int $id;

        function __construct(string $todo= '') {
            $this->todo = $todo;
        }

        function getId(): string {
            return $this->id;
        }

        function setId(string $id): void {
            $this->id = $id;
        }

        function getTodo(): string {
            return $this->todo;
        }

        function setTodo(string $todo): void {
            $this->todo = $todo;
        }
    }
?>