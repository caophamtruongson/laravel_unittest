<?php
namespace App\Services;

use App\Models\TodoModelInterface;

class TodoService implements TodoServiceInterface
{

    private $todo;

    public function __construct(TodoModelInterface $todo)
    {
        $this->todo = $todo;
    }

    public function getByStatus($status)
    {
        $todos = $this->todo->getByStatus($status);

        foreach ($todos as $todo) {
            if ($todo->status == \Config::get('app.status.todo.incomplete')) {
                $todo->status_name = 'INCOMPLETE';
            } elseif ($todo->status == \Config::get('app.status.todo.completed')) {
                $todo->status_name = 'COMPLETED';
            }
        }
        return $todos;
    }
    public function getDeleted()
    {
        $todos = $this->todo->getDeleted();
        foreach ($todos as $todo) {
            $todo->status_name = 'DELETED';
        }
        return $todos;
    }
}
