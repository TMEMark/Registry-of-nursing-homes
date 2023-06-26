<?php

namespace service;

use dao\UserRepository;
use entity\UserEntity;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function login(string $username, string $password): bool {
        // Fetch user from the database by username
        $user = $this->userRepository->getUserByUsername($username);

        if ($user && password_verify($password, $user->getPassword())) {
            $this->startSession($user);
            $_SESSION["logedIn"] = true;
            return true;
        }

        return false;
    }
    private function startSession(UserEntity $user) {
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
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