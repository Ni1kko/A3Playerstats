<?php require_once("globals.php"); ?> 
<!doctype html>
<html lang="en">

<head>
    <!-- Encoding --><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <!-- Viewport --><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author --><meta name="author" content="Nikko Renolds" />
    <!-- Description --><meta name="description" content="A3Playerstats" />  
    <!-- Title --><title>A3Playerstats | Search Results For <?php echo $_SESSION["searchKey"];?></title>
    <!-- Favicon --><link href="/img/favicon-2.ico" rel="icon" type="image/x-icon" />
    
    <!-- Font Awesome --><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS --><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap --><link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
    <!-- Custom CSS --><link href="assests/css/style.css" rel="stylesheet">
</head>

<body class="a3ps-body">

    <!--Header-->
    <div class="a3ps-header">
        <div class="container">
            <div class="row no-gutters d-flex justify-content-center">
                <div class="col-md-8">
                    <header> 
                        <nav class="navbar navbar-expand-lg navbar-dark sticky-top scrolling-navbar z-depth-0">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#A3StatsNavBarToggle" aria-controls="A3StatsNavBarToggle" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="A3StatsNavBarToggle">
                                <a class="navbar-brand" href="index.html">  A3Playerstats </a>
                                <ul class="navbar-nav mr-auto mt-lg-0">
                                    <li class="nav-item"> <a class="nav-link" href="index.html">Home</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="leaderboards.php">Leaderboards</a> </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                </div>
            </div>
        </div>
    </div>

    <!--content-->
    <div class="container a3ps-content">

        <div class="row no-gutters d-flex justify-content-center">
            <div class="col-md-8 pt-5">
                <div class="card mb-5 a3ps-background">
                    
                    <!--breadcrumbs-->
                    <div class="card-header p-0 a3ps-breadcrumbs">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 a3ps-breadcrumb-content-after a3ps-background"> 
                                <li class="breadcrumb-item text-light" aria-current="page"><a href="index.html">Search</a></li> 
                                <li class="breadcrumb-item text-light active" aria-current="page">Results</li> 
                            </ol>
                        </nav>
                    </div>
                     
                    <!-- -->
                    <div class="card-body text-center">
                        
                        <!--Search box--> 
                        <h5 class="text-white-50 font-weight-light small">Search for a PlayerName | SteamID | NumberPlate</h5>
                        <div load-html="includes/search.html"></div> 

                        <!--result brief-->

                        <div class="">
                            <p class="text-white h5 font-weight-light text-truncate">Search for <span style="color: hsl(27, 85%, 50%);">&nbsp;<?php echo $_SESSION["searchKey"]?></span></p>
                            <p class="text-white h5 font-weight-light"> returned<span style="color: hsl(27, 85%, 50%);"> <?php echo count($_SESSION["users"]); echo count($_SESSION["users"]) > 1 ? "&nbsp;Results" : "&nbsp;Result";?> </span></p> 
                        </div>

                        <!--result data--> 
                        <div class="row mt-5"> 
                            <?php foreach($_SESSION["users"] as $user): ?>
                                <div class="col-12 mb-4"> 
                                    <div class="card" style="background-color: #171717">
                                        <div class="card-body">
                                            <a href="player.php?pid=<?php echo $user["pid"];?>">
                                                <p class="h3 m-0 font-weight-normal text-truncate" style="color: hsl(27, 85%, 50%);"><?php echo $user["name"];?></p>
                                                <h4 class="card-text m-0"><?php echo $user["pid"];?></h4>
                                                <hr style="border-color: hsl(27, 85%, 50%); ">
                                                <h4 class="float-left white-text h6">Bank: <span class="green-text"><?php echo PlayerInfo::DisplayUserBank($user["bankacc"]);?></span></h4>
                                                <h4 class="float-right white-text h6">Cash: <span class="green-text"><?php echo PlayerInfo::DisplayUserBank($user["cash"]);?></span></h4>
                                            </a> 
                                        </div>
                                    </div>
                                </div> 
                            <?php endforeach; ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div load-html="includes/footer.html"></div> 


    <!-- JQuery --><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <!-- Bootstrap tooltips --><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript --><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript --><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
    <!-- Custom JavaScript --><script src="assests/js/functions.js" type="text/javascript"></script>
</body>

</html>