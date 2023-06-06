<?php

namespace rest\request;

use service\UserService;

class OldUserReqHandler
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @throws Exception
     */
    public function handleRequests()
    {
        if (isset($_GET['getById']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->userService->getUserById($_GET['getById']));
        }
        if (isset($_GET['getByName']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->userService->getUserByName($_GET['getByName']));
        }
        if (isset($_GET['listAll']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($this->userService->listUsers());
        }
        if (isset($_GET['insert']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $body = file_get_contents("php://input");
            $event = json_decode($body, true);
            $this->userService->insertUser($event);
        }
        if (isset($_GET['update']) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
            $body = file_get_contents("php://input");
            $event = json_decode($body, true);
            $this->userService->updateUser($event);
        }

        if (isset($_GET['delete']) && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->userService->deleteUser($_GET['delete']);
        }
    }
}