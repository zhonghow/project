<?php

class Authentication
{
    public $database;

    public function  __construct()
    {
        $this->database = connectDB();
    }

    public function login($email, $password)
    {

        $message = '';

        if (!empty($email) && empty($password)) {
            $message = "Password field are required.";
        } else if (empty($email) || empty($password)) {
            $message = "All fields are required.";
        }

        if (!empty($message)) {
            return $message;
        }

        $statement = $this->database->prepare('SELECT * FROM management where email = :email ');

        $statement->execute([
            'email' => $email
        ]);

        $user = $statement->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'password' => $user['password']
                ];
            } else {
                return "Invalid Email or Password.";
            }
            header('Location:/');
            exit;
        } else {
            return "Invalid Email or Password.";
        }
    }

    public function signUp($email, $password, $confirm_password)
    {
        $message = '';


        if (empty($email) || empty($password) || empty($confirm_password)) {
            $message = "All fields are required.";
        } 

        if (strlen($password) < 8) {
            $message = "Password must be 8 characters or above.";
        }

        if (!empty($password) && !empty($confirm_password) && $password !== $confirm_password) {
            $message = "Password & Confirmation Password field should match";
        }

        if (!empty($message)) {
            return $message;
        }

        $statement = $this->database->prepare('SELECT * FROM management where email = :email');
        $statement->execute([
            'email' => $email
        ]);

        $user = $statement->fetch();

        if ($user) {
            return 'Email already exist';
        } else {
            $statement = $this->database->prepare(
                'INSERT INTO management (email,password) VALUES (:email, :password)'
            );

            $statement->execute([
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            header('Location:/login.php?status=registered');
            exit;
        }
    }
}
