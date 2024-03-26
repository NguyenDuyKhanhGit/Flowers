<?php
    require_once('../models/User.php');
    require_once('../helpers/session_helper.php');
    class UserController {
        private $userModel;
        public function __construct() {
            $this->userModel = new User();
        }
        public function register() {
            //Xử lý form

            /**
             * loại bỏ các ký tự không mong muốn hoặc để chuyển đổi dữ liệu vào định dạng mong muốn, chẳng hạn như chuyển đổi các ký tự HTML đặc biệt 
                * thành các ký tự thực thể HTML (HTML entities)
            * để tránh tấn công XSS (Cross-Site Scripting).*/
            $_POST = filter_input_array(INPUT_POST);
            //Khởi tạo dữ liệu
            $data = [
                'fullname' => trim($_POST['fullname']),
                'email' => trim($_POST['email']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'password2' => trim($_POST['password2']),
                'role' => trim($_POST['role'])
            ];
            if(empty($data['fullname']) || empty($data['email']) || empty($data['username']) || empty($data['password']) || empty($data['password2']) || empty($data['role'])) {
                flash("register",'Vui lòng điền đầy đủ tất cả các trường');
                redirect('../login.php');
            }
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
                flash("register",'Email không hợp lệ');
                redirect('../login.php');
            }
            if ($data['password'] !== $data['password2']) {
                flash('register',"Mật khẩu lần 2 không giống lần 1");
            }
            if($this->userModel->findUserByEmailOrUsername($data['email'],$data['username'])) {
                flash('register','Tài khoản hoặc email đã tồn tại');
                redirect('../login.php');
            }
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            if($this->userModel->register($data)) {
                flash('register','Đăng ký thành công','form-message-green');
                redirect('../login.php');
            } else {
                die("Có gì đó sai");
            }
        }
        public function login() {
            $_POST = filter_input_array(INPUT_POST);
            //Khởi tạo dữ liệu
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password'])
            ];
            $loggedInUser = $this->userModel->login($data['username'],$data['password']);
            if($loggedInUser) {
                $this->createUserSession($loggedInUser);
                redirect('../index.php');
            } else {
                flash('login','Tài khoản hoặc mật khẩu không chính xác');
                redirect('../login.php');
            }
        }
        public function createUserSession($user) {
            $_SESSION['userId'] = $user->id; 
            $_SESSION['username'] = $user->username; 
            $_SESSION['fullname'] = $user->fullname; 
            redirect('../index.php');
        }
    }
    $init = new UserController();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        switch($_POST['type']) {
            case 'register':
                $init->register();
                break;
            case 'login': 
                $init->login();
        }
    }
?>