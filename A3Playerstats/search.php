
<?php 

    /*get Search Key**/
    $searchKey = $_GET['searchKey'];

    /**check Search Key**/
    if (!$searchKey){
        header("Location: index.php");
        exit;
    }
    else /**if keyword exits**/ 
    { 
        /**get database login**/
        $database = json_decode(file_get_contents("config.json"))->database;  
      
        /**check database connection**/
        $conn = new mysqli($database->host, $database->user, $database->password, $database->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else
        {
            $users = array();
            
            /**check with pid**/
            //Todo: make this a function
            $sql = "SELECT * FROM players WHERE pid='$searchKey'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($users,$row);
                }
            }
            
            /**check with name**/
            $sql = "SELECT * FROM players WHERE name Like '%$searchKey%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($users,$row);
                }
            }
            
            /**check with plate**/
            $sql = "SELECT * FROM vehicles WHERE plate LIKE '%$searchKey%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
                    /**get pid using plate**/
                    $pid = $row["pid"];
                    $sql = "SELECT * FROM players WHERE pid='$pid'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            array_push($users,$row);
                        }
                    }		
                }
            }
            
            $conn->close();
            
            /**get result count**/
            if(count($users)){
                session_start();
                $_SESSION["searchKey"] = $searchKey;
                $_SESSION["users"] = $users;

                //echo "Found a result for: ".$_SESSION["searchKey"]."<br>"; 
                //print_r($_SESSION["users"]);
                header("Location: result.php");
            }
            else
            {
                header("Location: index.php");
                exit;
            }
        }
    }
