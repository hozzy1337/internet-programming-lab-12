<?php
require __DIR__ . '/config.php';

class DemoLib
{
 
    public function Register($name, $email, $username, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("INSERT INTO users(name, email, username, password) VALUES (:name,:email,:username,:password)");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    public function isUsername($username)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 

    public function isEmail($email)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    public function Login($username, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE (username=:username OR email=:username) AND password=:password");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->user_id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    public function UserDetails($user_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id, name, username, email FROM users WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
	
		public function DeleteUser($user_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("DELETE FROM users WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
			return true;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
	
		public function UpdateUser($user_id, $name, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("UPDATE users SET name = :name, password = :password WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
			$query->bindParam("name", $name, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
			return true;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}