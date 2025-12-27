?>    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'Database.php';

class User
{
    private $db;
    private $table = "users";

    private $userId;
    private $name;
    private $email;
    private $gender;
    private $password;
    private $confirm_password;
    public $role;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getId()
    {
        return $this->userId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }

    // ====================
    // SETTERS
    // ====================
    public function setUserId($id)
    {
        $this->userId = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setConfirmPassword($confirm_password)
    {
        $this->confirm_password = $confirm_password;
    }


    public function register()
    { 
            $errors = [];
            $regPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^])[A-Za-z\d@$!%*?&#^]{8,}$/";
            // 4. الفحص (بترتيب منطقي)
            if (empty($this->name)) {
                $errors[] = "Name is required.";
            } elseif (empty($this->email)) {
                $errors[] = "Email is required.";
            } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            } elseif (empty($this->gender)) {
                $errors[] = "Please select your gender.";
            } elseif (empty($this->password)) {
                $errors[] = "Password is required.";
            } elseif (!preg_match($regPassword, $this->password)) {
                $errors[] = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
            } elseif ($this->password !== $this->confirm_password) {
                $errors[] = "Passwords do not match.";
            }
            $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$this->email]);
            $emailExists = $stmt->fetchColumn();
            if ($emailExists) {
                $errors[] = "This email is already registered.";
            }

            // Using prepared statements to prevent SQL injection
            if (empty($errors)) {
                $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (name, email, password, gender, user_type) VALUES (?,?,?,?,?)";
                $param = [$this->name, $this->email, $hashedPassword, $this->gender, 'user'];
                $stmt = $this->db->prepare($sql);
                $stmt->execute($param);
                return $errors;
            } else
                return $errors;

        
    }
    public function updateAll()
    { 
            $errors = [];
            $regPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^])[A-Za-z\d@$!%*?&#^]{8,}$/";
            // 4. الفحص (بترتيب منطقي)
            if (empty($this->name)) {
                $errors[] = "Name is required.";
            } elseif (empty($this->email)) {
                $errors[] = "Email is required.";
            } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            } elseif (empty($this->gender)) {
                $errors[] = "Please select your gender.";
            } elseif (empty($this->password)) {
                $errors[] = "Password is required.";
            } elseif (!preg_match($regPassword, $this->password)) {
                $errors[] = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
            } elseif ($this->password !== $this->confirm_password) {
                $errors[] = "Passwords do not match.";
            }
            elseif($_SESSION["email"] != $this->email){
                echo "<h1>$_SESSION[email]   /////  $this->email </h1>";
            $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$this->email]);
            $emailExists = $stmt->fetchColumn();
            if ($emailExists) {
                $errors[] = "This email is already registered.";
            }
        }

            // Using prepared statements to prevent SQL injection
            if (empty($errors)) {
                $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

                   $sql =  "UPDATE users SET name = ?, email = ?, gender = ?,password = ? WHERE user_id = ?";
                $param = [$this->name, $this->email,$this->gender,$hashedPassword, $_SESSION['user_id']];
                $stmt = $this->db->prepare($sql);
                $stmt->execute($param);
              
                return $errors;
            } else
                return $errors;

        
    }

    public function updateWithoutPassword()
    { 
            $errors = [];
            if (empty($this->name)) {
                $errors[] = "Name is required.";
            } elseif (empty($this->email)) {
                $errors[] = "Email is required.";
            } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            } elseif (empty($this->gender)) {
                $errors[] = "Please select your gender.";
            }
            elseif($_SESSION["email"] != $this->email){
                echo "<h1>$_SESSION[email]   /////  $this->email </h1>";
            $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$this->email]);
            $emailExists = $stmt->fetchColumn();
            if ($emailExists) {
                $errors[] = "This email is already registered.";
            }
        }
             
            // Using prepared statements to prevent SQL injection
            if (empty($errors)) {

                $sql =  "UPDATE users SET name = ?, email = ?, gender = ? WHERE user_id = ?";
                $param = [$this->name, $this->email,$this->gender,$_SESSION['user_id']];
                $stmt = $this->db->prepare($sql);
                $stmt->execute($param);
                return $errors;
            } else
                return $errors;
        }
        
    
    public static function login($email, $password)
    {
        $db = Database::getInstance()->getConnection();

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user["user_type"] == "user" && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_type'] = $user['user_type'];
            $_SESSION['login'] = true;
            header("Location: ../index.php");
            exit;
        } else if ($user["user_type"] == "admin" && $password == $user['password']) {

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_type'] = $user['user_type'];
            $_SESSION['login'] = true;
            header("Location: ../index.php");
            echo "admin";

        } else
            return "Not Valid Email Or Password";
    }



    public static function logout()
    {
        // Destroy session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        return true;
    }

    // Additional methods for user management
}