<?php require_once("globals.php"); ?> 
<!doctype html>
<html lang="en_gb" dir="ltr">

<head> 
    <!-- Encoding --><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <!-- Viewport --><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author --><meta name="author" content="Nikko Renolds" />
    <!-- Description --><meta name="description" content="A3Playerstats" />  
    <!-- Title --><title>A3Playerstats | Search</title> 
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
                <div class="col-md-12">
                    <header> 
                        <nav class="navbar navbar-expand-lg navbar-dark sticky-top scrolling-navbar z-depth-0">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#A3StatsNavBarToggle" aria-controls="A3StatsNavBarToggle" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="A3StatsNavBarToggle">
                                <a class="navbar-brand" href="index.php">  A3Playerstats </a>
                                <ul class="navbar-nav mr-auto mt-lg-0">
                                    <li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>
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
    <div class="container a3ps-content pt-2"> 
        <div class="row no-gutters d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card a3ps-background">
                    
                    <!--breadcrumbs-->
                    <div class="card-header p-0 a3ps-breadcrumbs">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 a3ps-breadcrumb-content-after a3ps-background">
                                <li class="breadcrumb-item text-light active" aria-current="page">Search</li> 
                            </ol>
                        </nav>
                    </div>
                     
                    <!-- -->
                    <div class="card-body text-center">
                         <!--Curved sitename--> 
                        <div class="py-4">
                            <p id="a3ps-arc-title" style="text-align: center;  font-size: 6em;font-weight: 500; text-shadow: 0px 0px 13px rgba(0, 0, 0, .1);letter-spacing: 1rem;">
                                ARMA
                            </p>
                            <p style="text-align: center; font-size: 3em; color: var(--secondary); font-weight: 500; text-shadow: 0px 0px 13px rgba(0, 0, 0, .1);letter-spacing: 1rem;">
                                PLAYERSTATS
                            </p>
                        </div>
            
                        <!--Search box--> 
                        <div load-html="includes/search.html"></div> 

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