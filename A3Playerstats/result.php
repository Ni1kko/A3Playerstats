<!DOCTYPE html>
<html lang="en" class="full-height">
    <head>
        <title>A3Playerstats | Search Results For <?php echo $_SESSION["searchKey"];?></title>
        <meta http-equiv="content-type" content="text/html; charset=windows-1252"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assests/css/style.css"> 
    </head> 

    <body> 

        <!--header-->
        <header class="py-2"> 
            <?php require_once("globals.php"); ?>   
            <nav class="navbar navbar-expand-lg black" style="background-color: var(--tertiary)">
                <div class="container">
                    <a class="navbar-brand white" href="#"><strong style="color: var(--secondary)">A3Playerstats</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="leaderboards.php">Leaderboards</a></li> 
                        </ul>
                    </div>
                </div>
            </nav>  
        </header>   
        
        <!--Content-->
        <div class="container container-theme text-center pb-4"> 

            <!--Breadcrumb bar-->
            <div class="container p-0"> 
                <nav aria-label="breadcrumb">  
                    <ol class="breadcrumb breadcrumb-content-after">  
                        <li class="breadcrumb-item text-light active" aria-current="page">Search Results</li>   
                    </ol>   
                </nav> 
            </div>

            <!--search area-->
            <div class="search">
                <div load-html="includes/search.html"></div> 
            </div>

            <!--result brief-->
            <div style="text-align: center; color: white;font-size: 40px;">
                Search for <span style="color: var(--primary); font-weight: 600;"><?php echo $_SESSION["searchKey"]?></span>
                returned<span style="color: var(--primary) !important;font-weight: 600;"> <?php echo count($_SESSION["users"])?> result</span> 
            </div>

            <!--result data-->
            <div style="text-align: left">
                <?php foreach($_SESSION["users"] as $user): ?>
                    <a class="result" href="player.php?pid=<?php echo $user["pid"];?>">
                        <h3>Name: <span class="span-theme"><?php echo $user["name"];?></span></h3>
                        <h4>Pid: <span class="span-theme"><?php echo $user["pid"];?></span></h4>
                        <h4>Bank: <span><?php echo PlayerInfo::DisplayUserBank($user["bankacc"]);?></span></h4>
                        <h4>Cash: <span><?php echo PlayerInfo::DisplayUserBank($user["cash"]);?></span></h4> 
                    </a>
                <?php endforeach; ?>
            </div>

        </div> 

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="assests/js/functions.js" type="text/javascript"></script>
    </body> 
</html> 
        


 
