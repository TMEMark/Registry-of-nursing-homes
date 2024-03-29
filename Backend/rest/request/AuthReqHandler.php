<?php

namespace request;

use service\AuthService;

class AuthReqHandler
{
    private AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function handleRequest($request, $postData) {
        switch ($request) {
            case 'login':
                $this->login($postData['username'], $postData['password']);
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                // Redirect to a default page or show an error
                break;
        }
    }

    private function login($username, $password) {
        if ($this->authService->login($username, $password)) {
            // Redirect to the home page or any other desired location
            header('Location: ../../../Frontend/Pages/serviceProvider.php');
        } else {
            // Redirect to the login page with an error message
            header('Location: login.php?error=1');
        }
        exit;
    }

    private function logout() {
        $this->authService->logout();

        // Redirect to the login page or any other desired location
        header('Location: login.php');
        exit;
    }
}