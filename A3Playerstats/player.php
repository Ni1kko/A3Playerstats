<!DOCTYPE html> 
<html lang="en" class="full-height">
    <head>
        <title>A3Playerstats | Player <?php echo $_GET['pid'];?></title>
        <meta http-equiv="content-type" content="text/html; charset=windows-1252"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assests/css/style.css"> 
    </head>
  
    <body> 

        <!--header-->
        <header class="py-2"> 
            <?php require_once("globals.php"); ?>
            <?php if(!$_GET['pid']){ header("Location: index.html"); exit; } ?>
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
            <?php if($user=Database::Query('SELECT * FROM players WHERE pid=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>  
                  
                <!--Breadcrumb bar-->
                <div class="container p-0"> 
                    <nav aria-label="breadcrumb">  
                        <ol class="breadcrumb breadcrumb-content-after">   
                            <li class="breadcrumb-item" ><a href="result.php">Search Results</a></li>  
                        <li class="breadcrumb-item text-light active" aria-current="page"><?php echo $user['name'];?></li>   
                        </ol>   
                    </nav> 
                </div>
    
                <!--Top row-->
                <div class="row" > 
                    <!--Player Details-->
                    <div class="col-md-6">
                        <div class="player-colbox">
                            <h2>Player Details</h2>
                            <p>&nbsp</p>
                            <p>Name: <a href="https://www.google.com/search?q=<?php echo $user['name'];?>"><span style="color: #ed7a16"><?php echo $user['name'];?></span></a></p>
                            <p>SteamID: <a href="https://steamcommunity.com/profiles/<?php echo $user['pid'];?>"><span style="color: #ed7a16"> <?php echo $user['pid'];?></span></a></p>
                            <p>Joined: <span><?php echo PlayerInfo::DisplayDays($user['insert_time']);?></span></p> 
                            <p>Last Seen: <span><?php echo PlayerInfo::DisplayDays($user['last_seen']);?></span></p> 

                        </div>
                    </div>

                    <!--Cash Information-->
                    <div class="col-md-6">
                        <div class="player-colbox">
                            <h2>Cash Information</h2>
                            <p>&nbsp</p>
                            <p>Bank: <span><?php echo PlayerInfo::DisplayUserBank($user["bankacc"]);?></span></p>
                            <p>Cash: <span><?php echo PlayerInfo::DisplayUserBank($user["cash"]);?></span></p>
                            <p>Gang: <span><?php echo PlayerInfo::DisplayGangBank($user["pid"]);?></span></p> 
                        </div>
                    </div>
                </div>

                <!--Middle row-->
                <div class="row">

                    <!--Faction Details-->
                    <div class="col-md-6">
                        <div class="player-colbox">
                            <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <span style="color: white">Faction Details</span>
                                <span class="player-colbox-dropdown player-colbox-dropdown-right" aria-hidden="true"></span>
                            </a></p> 
                            <div class="collapse" id="collapse1">
                                <p style="font-size: 18px;">Staff: <span style="color: red"><?php echo (int)$user['adminlevel']>0 ? "yes" : "no";?></span></p>
                                <p style="font-size: 18px;">Police: <span style="color: blue"><?php echo (int)$user['coplevel']>0 ? "yes" : "no";?></span></p>
                                <p style="font-size: 18px;">NHS: <span style="color: green"><?php echo (int)$user['mediclevel']>0 ? "yes" : "no";?></span></p>
                            </div>
                        </div>
                    </div>

                    <!--Vehicle Details-->
                    <div class="col-md-6">
                        <div class="player-colbox">
                            <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                <span style="color: white">Vehicle Details</span>
                                <span class="player-colbox-dropdown player-colbox-dropdown-right" aria-hidden="true"></span>
                            </a></p>
                            <div class="collapse" id="collapse2">
                                <?php if($uservehicles=Database::Query('SELECT * FROM vehicles WHERE pid=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>  
                                    <?php foreach($uservehicles as $uservehicle): ?>
                                    <h4><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Vehicle ID: <?php echo $uservehicle['id']?></h4>
                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ClassName: <?php echo $uservehicle['classname']?></h4>
                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Plate: <?php echo $uservehicle['plate']?></h4>
                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Purchased: <?php echo PlayerInfo::DisplayDays($uservehicle['insert_time']);?></h4>
                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Type: <?php echo $uservehicle['type']?></h4><br>  
                                    <?php endforeach; ?>  
                                <?php else: ?> 
                                    <h4><p>No Vehicles Owned</p></h4>  
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Bottom row-->
                <div class="row">

                    <!--Civ licenses-->
                    <div class="col-md-4">
                        <div class="player-colbox">
                            <h1>Civ licenses</h1>
                            <?php foreach(PlayerInfo::DisplayLicenses($user["civ_licenses"]) as $civ_license): ?>
                                <span class='license-badge license-badge-<?php echo $civ_license[1]==1?"true":"false";?>'><?php echo $civ_license[0];?></span> 
                            <?php endforeach; ?>  
                        </div> 
                    </div>

                    <!--Cop licenses-->
                    <div class="col-md-4">
                        <div class="player-colbox">
                            <h1>Cop licenses</h1>
                            <?php foreach(PlayerInfo::DisplayLicenses($user["cop_licenses"]) as $cop_license): ?>
                                <span class='license-badge license-badge-<?php echo $cop_license[1]==1?"true":"false";?>'><?php echo $cop_license[0];?></span>  
                            <?php endforeach; ?> 
                        </div> 
                    </div>

                    <!--Med licenses-->
                    <div class="col-md-4">
                        <div class="player-colbox">
                            <h1>Med licenses</h1>
                            <?php foreach(PlayerInfo::DisplayLicenses($user["med_licenses"]) as $med_license): ?> 
                                <span class='license-badge license-badge-<?php echo $med_licenses[1]==1?"true":"false";?>'><?php echo $med_licenses[0];?></span> 
                            <?php endforeach; ?>  
                        </div> 
                    </div> 

                </div>  

            <?php else: ?>  
                <h1 class="text-center">No results found for: <?php echo $_GET['pid'];?></h1>
            <?php endif; ?>     
        </div> 
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body> 
</html> 
