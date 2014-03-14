<?php
require_once 'constants.php';
class Db {

    private static $instance;
    private $handler;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

    private function __clone() {}

    private function connectDB() {
        try {
            $this->handler = new PDO(Constants::getDSN(), Constants::getDBUserName(), Constants::getDBPassword());
        } catch (PDOException $e) {
            echo "DB Connection Failed: " . $e->getMessage();
        }
    }
    
    private function runQuery($query,$valArray, $returnType = 'one'){
        $statement = $this->handler->prepare($query);
        if(!$statement){
            echo "Prepare statement failed: ". $this->handler->errorInfo();
        }
        $statement->execute($valArray);
        if($returnType == 'one'){
            $resultSet = $statement->fetch();
            return $resultSet;
        }
        if($returnType == 'all'){
            $resultSet = $statement->fetchAll();
            return $resultSet;
        }
        if($returnType == 'allassos'){
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultSet;
        }
    }
    public function products() {
        $this->connectDB();
        $query = "SELECT * FROM Android";
        $resultset = $this->runQuery($query, array(), 'allassos' );
        return $resultset;
    }
    public function frontProducts() {
        $this->connectDB();
        $query = "SELECT count(*) as Totalrows FROM Android";
        $resultset = $this->runQuery($query, array(), 'one' );
        return $resultset['Totalrows'];
    }
	public function frontSlide() {
        $this->connectDB();
        $query = "SELECT imageName FROM frontslide";
        $resultset = $this->runQuery($query, array(), 'allassos' );
        return $resultset;
    }
	
    public function quotes(){
        $this->connectDB();
        $query = "SELECT * FROM quotes";
        $resultset = $this->runQuery($query, array(), 'allassos' );
        return $resultset;
    }
}
