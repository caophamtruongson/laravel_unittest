<?php
use App\Http\Controllers\TodoController;

class TodoControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->app->bind(
            'App\Services\TodoServiceInterface',
            function () {
                return new TodoServiceMock();
            }
        );
    }
    public function testGetByStatus()
    {
        $response = $this->call('GET', '/todos/1');
        $this->assertEquals(200, $response->getStatusCode());
    }
}
