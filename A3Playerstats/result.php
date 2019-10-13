<?php
  require_once("globals.php"); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>A3Playerstats | Search Results For <?php echo $_SESSION["searchKey"];?></title>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assests/css/style.css"> 
  </head>

<!--header-->
 <header> 
</header>   

<body class="py-4">
 
    <!--content-->
    <div class="container">

        <!--Breadcrumb bar-->
        <nav aria-label="breadcrumb">  
            <ol class="breadcrumb breadcrumb-content-after bg-dark ">  
                <li class="breadcrumb-item" aria-current="page"><a href="index.html">Home</a></li>   
                <li class="breadcrumb-item text-light active" aria-current="page">Result</li>  
            </ol>   
        </nav>
   
        <div style="text-align: center">

          <!--search area-->
          <div class="search">
              <form id="search" method="get" action="search.php">
                  <input placeholder="Search for Name / SteamID / Plate..." id="searchBar" name="searchKey" type="text">
                  <input value="Search" type="submit">
              </form>
          </div>

          <!--result brief-->
          <div style="text-align: center; color: white;font-size: 40px;margin-top: 50px;margin-bottom: 50px">
            Search for <span style="color: var(--primary); font-weight: 600;"><?php echo $_SESSION["searchKey"]?></span>
            returned<span style="color: var(--primary) !important;font-weight: 600;"> <?php echo count($_SESSION["users"])?> result</span> 
          </div>

          <!--result data-->
          <div style="text-align: left">
            <?php foreach($_SESSION["users"] as $user): ?>
                <a class="result" href="player.php?pid=<?php echo $user["pid"];?>">
                <p>name:</p><h3 style="color: var(--primary)"><?php echo $user["name"];?></h3>
                <p>pid:</p><h4 style="color: black"><?php echo $user["pid"];?></h4>
                <p>bank:</p><h4 style="color: black"><?php echo strlen($user["bankacc"]) > 0 ? "$ " . $user["bankacc"] : "Nil";?></h4>
                <p>cash:</p><h4 style="color: black"><?php echo strlen($user["cash"]) > 0 ? "$ " . $user["cash"] : "Nil";?></h4>  
                </a>
            <?php endforeach; ?>
          </div>
        </div>
 
    </div> 
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assests/js/circletype.min.js"></script>
    <script type="text/javascript"> $(document).ready(function(){
            var users = <?php echo json_encode($_SESSION["users"])?>;
            console.log(users);
        });
    </script>
</body>
 
</html> 
        


 
