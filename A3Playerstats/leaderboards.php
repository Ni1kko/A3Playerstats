<?php require_once("globals.php"); ?>  
<!doctype html>
<html lang="en">

<head>
    <!-- Encoding --><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <!-- Viewport --><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author --><meta name="author" content="Nikko Renolds" />
    <!-- Description --><meta name="description" content="A3Playerstats" />  
    <!-- Title --><title>A3Playerstats | Leaderboards</title>
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

    <div class="container a3ps-content pt-2"> 
        <div class="row no-gutters d-flex justify-content-center">  
                <div class="card mb-5 a3ps-background">
                    
                    <!--breadcrumbs-->
                    <div class="card-header p-0 a3ps-breadcrumbs">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 a3ps-breadcrumb-content-after a3ps-background">  
                                <li class="breadcrumb-item text-light active" aria-current="page">Leaderboards</li> 
                            </ol>
                        </nav>
                    </div>
                    
                    <!-- -->
                    <div class="card-body text-center"> 
                        <?php //print_r( Leaderboard::DisplayTopCivilians(Database::AllCivilians(), 100) );?>
                        <?php //print_r( Leaderboard::DisplayTopMedics(Database::AllMedics(), 100) );?>
                        <?php //print_r( Leaderboard::DisplayTopPolice(Database::AllPolice(), 100) );?>    

                        <div class="table-responsive"> 
                            <table class="table"> 

                                <thead> 
                                    <tr> 
                                        <th style="width: 5%"><a href=""></a></th> 
                                        <th style="width: 30%"><a style="color:white;font-size:18px">Leaderboards</a></th> 
                                        <th style="width: 25%"><a id="civilian_btn" class="btn" style="border-color: black;color:purple">Civilians</a></th> 
                                        <th style="width: 20%"><a id="police_btn" class="btn" style="border-color: black;color:#2727d6">Police</a></th> 
                                        <th style="width: 20%"><a id="medic_btn" class="btn" style="border-color: black;color:#2daa3b">Medics</a></th> 
                                    </tr> 
                                </thead> 

                                <tbody id="display_area">
                                    <?php $civpos=0; foreach(Leaderboard::DisplayTopCivilians(Database::AllCivilians(), 100) as $topcivilian) : $civpos++  ?>
                                        <tr> 
                                            <td><?php echo $civpos;?></td>
                                            <td><b><?php echo $topcivilian["name"];?></b><br><?php echo $topcivilian["pid"];?></td> 
                                            <td><b>Bank</b><br>$ <?php echo $topcivilian["bankacc"];?></td> 
                                            <td><b>Cash</b><br>$ <?php echo $topcivilian["cash"];?></td> 
                                            <td><a href="player.php?pid=<?php echo $topcivilian["pid"];?>"><b>more</b></a></td> 
                                        </tr> 
                                    <?php endforeach; ?>  
                                </tbody>

                            </table> 
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