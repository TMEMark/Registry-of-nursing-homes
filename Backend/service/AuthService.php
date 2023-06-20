<?php

namespace service;

use dao\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    private function startSession($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    }

    public function login(string $username, string $password): bool {
        // Fetch user from the database by username
        $user = $this->userRepository->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->startSession($user);
            return true;
        }

        return false;
    }

    public function logout() {
        // Destroy the session
        session_start();
        session_destroy();
    }

    public function isLoggedIn() {
        // Check if the user is logged in by checking session variables
        session_start();
        return isset($_SESSION['user_id']);
    }
}