<?php 
/**
 * PDO Database Class
 * Connect DB
 * Create prepared statements
 * Bind values
 * return rows andd results
 * */
class Database {
    private $host = 'localhost'; // Tên miền
    private $user = 'root'; //Tài khoản truy cập CSDL
    private $password = ''; //Mật khẩu truy cập CSDL
    private $dbname = 'flower'; //Tên cơ sở dữ liệu
    private $dbh; //Kết nối đến cơ sở dữ liệu
    private $stmt; //thực hiện các truy vấn SQL đã được chuẩn bị trước
    private $error; //lưu trữ lỗi nếu kết nối DB không thành công

    public function __construct() {
        //Set DSN (Data source Name)
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true, //Duy trì kết nối
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Bắt lỗi một cách tự động
        );
        //Tạo thể hiện của PDO
        try {
            $this->dbh = new PDO($dsn,$this->user,$this->password,$options);
        }catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute() {
        return $this->stmt->execute();
    }
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
?>