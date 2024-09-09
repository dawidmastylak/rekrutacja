<?php

class UserValidator
{
    public function validateEmail(string $email): bool
    {
        $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        if (preg_match($emailPattern, $email)) {
            return true;
        }
        return false;
    }

    public function validatePassword(string $password): bool
    {
        return strlen($password) >= 8 &&
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[a-z]/', $password) &&
            preg_match('/\d/', $password) &&
            preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password);
    }
}


// Przykład użycia
$validator = new UserValidator();
$email = "test@example.com";
$password = "StrongPass1!";

if ($validator->validateEmail($email)) {
    echo "Email is valid.\n";
} else {
    echo "Email is invalid.\n";
}

if ($validator->validatePassword($password)) {
    echo "Password is valid.\n";
} else {
    echo "Password is invalid.\n";
}
