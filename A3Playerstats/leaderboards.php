<!DOCTYPE html>
<html lang="en" class="full-height">
    <head>
        <title>A3Playerstats | Leaderboards</title>
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
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li> 
                            <li class="nav-item active"><a class="nav-link"  href="leaderboards.php">Leaderboards<span class="sr-only">(current)</span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>  
        </header>   
        
        <!--Content-->
        <div class="container container-theme text-center pb-4"> 
 
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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="assests/js/functions.js" type="text/javascript"></script>
    </body> 
</html> 
        


 
