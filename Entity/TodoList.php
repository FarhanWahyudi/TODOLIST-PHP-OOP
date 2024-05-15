<?php
    namespace Entity;

    class TodoList {
        private string $todo;

        function __construct(string $todo= '') {
            $this->todo = $todo;
        }

        function getTodo(): string {
            return $this->todo;
        }

        function setTodo(string $todo): void {
            $this->todo = $todo;
        }
    }
?>