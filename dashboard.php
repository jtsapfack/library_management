<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'library_system';
    private $username = 'library_admin';
    private $password = 'your_secure_password_here';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
                )
            );
        } catch(PDOException $e) {
            error_log("Connection Error: " . $e->getMessage());
            throw new Exception("Database connection failed");
        }

        return $this->conn;
    }
}

// Example user authentication function
function authenticateUser($username, $password) {
    $database = new Database();
    $db = $database->connect();
    
    $query = "SELECT id, username, password_hash, role FROM users WHERE username = :username AND status = 'active'";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        
        // Verify password with password_hash()
        if(password_verify($password, $row['password_hash'])) {
            // Create session token
            $token = bin2hex(random_bytes(32));
            
            // Store token in database
            $updateToken = "UPDATE users SET session_token = :token WHERE id = :id";
            $stmt2 = $db->prepare($updateToken);
            $stmt2->bindParam(':token', hash('sha256', $token));
            $stmt2->bindParam(':id', $row['id']);
            $stmt2->execute();
            
            return [
                'success' => true,
                'token' => $token,
                'user' => [
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'role' => $row['role']
                ]
            ];
        }
    }
    
    return ['success' => false, 'message' => 'Invalid credentials'];
}
?>
