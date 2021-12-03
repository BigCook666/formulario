
    <?php  
          
          class sportsModel  
          {  
              // set database config for mysql  
              function __construct($consetup)  
              {  
                  $this->host = $consetup->host;  
                  $this->user = $consetup->user;  
                  $this->pass =  $consetup->pass;  
                  $this->db = $consetup->db;                                  
              }  
              // open mysql data base  
              public function open_db()  
              {  
                  $this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);  
                  if ($this->condb->connect_error)   
                  {  
                      die("Erron in connection: " . $this->condb->connect_error);  
                  }  
              }  
              // close database  
              public function close_db()  
              {  
                  $this->condb->close();  
              }  
              // insert record  
              public function insertRecord($obj){ }  
                  //update record  
              public function updateRecord($obj){ }  
                   // delete record  
              public function deleteRecord($id){ }     
                   // select record       
              public function selectRecord($id){ }  
          }  
            
          ?>  
      