<?php 
    require_once('../libraries/Database.php');
    class User{ 
        private $db;
        public function __construct(){
            $this->db = new Database();
        }
        //Kiểm tra xem tồn tại username hoặc email trước đó chưa
        public function findUserByEmailOrUsername($email, $username) {
            $this->db->query('SELECT * FROM users where username = :username OR email = :email');
            $this->db->bind(':username',$username);
            $this->db->bind(':email',$email);
            $row = $this->db->single();
            if($this->db->rowCount()>0) {
                return $row;
            } else {
                return false;
            }
        }
        //Đăng ký người dùng
        public function register($data) {
            $this->db->query('INSERT INTO `users`( `fullname`, `email`, `username`, `password`, `role`) VALUES (:fullname,:email,:username,:password,:role)');
            $this->db->bind('fullname',$data['fullname']);
            $this->db->bind('email',$data['email']);
            $this->db->bind('username',$data['username']);
            $this->db->bind('password',$data['password']);
            $this->db->bind('role',$data['role']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function login($username, $password) {
            $row = $this->findUserByEmailOrUsername($username,$username);

            if(!$row) {
                return false;
            }
        
            $hashedPassword = $row->password;
            if(password_verify($password,$hashedPassword)) {
                return $row;
            }else {
                return false;
            }
        }
    }
?>