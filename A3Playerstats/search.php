
<?php 
    /*get Search Key**/
    $searchKey = $_GET['searchKey'];

    /**
     * Check keyword exits
    **/
    if (!$searchKey){
        header("Location: index.html");
        exit;
    }

    /**
     * keyword exits
    **/  
    require_once("globals.php");  
    $users = array();
    
    /**check with pid**/  
    $result = Database::Query('SELECT * FROM players WHERE pid=:pid', array(':pid'=>$searchKey))[0]; 
    if(count($result) > 0){
        array_push($users,$result);
    }  
        
    /**check with name**/
    $result = Database::Query('SELECT * FROM players WHERE name LIKE :name', array(':name'=> '%'.$searchKey.'%'))[0]; 
    if(count($result) > 0){
        array_push($users,$result);
    }
        
    /**check with plate**/
    $result = Database::Query("SELECT * FROM vehicles WHERE plate Like '%:plate%'", array(':plate'=>$searchKey))[0]; 
    if(count($result) > 0){ 
        $result2 = Database::Query('SELECT * FROM players WHERE pid=:pid', array(':pid'=>$result["pid"]))[0]; 
        if(count($result2) > 0){
            array_push($users,$result2);
        }  
    }
    
    /**get result count**/
    if(count($users)){ 
        $_SESSION["searchKey"] = $searchKey;
        $_SESSION["users"] = $users;

        //echo "Found a result for: ".$_SESSION["searchKey"]."<br>"; 
        //print_r($_SESSION["users"]);
        header("Location: result.php");
    }
    else
    {
        header("Location: index.html");
        exit;
    }
  
  