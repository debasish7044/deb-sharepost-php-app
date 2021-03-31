
<?php

/*

 *PDO database class
 *connect to database
 *Create prepare statement
 *Bind values
 *return rows and results

 */

  class Database { 
    private $host = 'localhost';
    private $user = 'root';
    private $pass =  '123456';
    private $dbname = 'sharepost';


     private $dbh;
     private $stmt;
     private $error;

      public function __construct()
      {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
          PDO::ATTR_PERSISTENT => true,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

       try {
         //code...
          $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

       } catch (PDOException $e) {
         //throw $th;
         $this->error = $e->getMessage();
         echo $this->error;
       }

      
      }

       //  Prepare statement with query
      public function query ($sql){
         $this->stmt = $this->dbh->prepare($sql);
      }

      // Bind values

      public function bind($param, $value, $type = null){
         if(is_null($type)){
           switch(true){
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
           $this->stmt->bindValue($param,$value,$type);
      }

    // execute the statement
    public function execute(){
      return $this->stmt->execute();
    }

    // Get result set Array of objects
    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Get A single record
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    }

  }





