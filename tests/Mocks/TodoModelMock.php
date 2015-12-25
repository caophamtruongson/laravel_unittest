<?php
namespace Tests\Mocks;

use App\Models\TodoModelInterface;
use Tests\Mocks\AbstractMock;
use Tests\Data\TodoData;

class TodoModelMock extends AbstractMock implements TodoModelInterface
{
    private $incomplete;
    private $completed;
    private $deleted;

    public function __construct()
    {
        $todoData = new TodoData();

        $this->incomplete = $todoData->getAsObject(TodoData::INCOMPLETE);
        $this->completed = $todoData->getAsObject(TodoData::COMPLETED);
        $this->deleted = $todoData->getAsObject(TodoData::DELETED);
    }

    public function getByStatus($status)
    {
        if ($status == \Config::get('app.status.todo.incomplete')) {
            return $this->incomplete;
        } elseif ($status == \Config::get('app.status.todo.completed')) {
            return $this->completed;
        }
    }
    public function getDeleted()
    {
        return $this->deleted;
    }
}
