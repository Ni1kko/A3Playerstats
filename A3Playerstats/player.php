<?php require_once("globals.php"); ?> 
<?php if(!$_GET['pid']){ header("Location: index.html"); exit; } ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Encoding --><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <!-- Viewport --><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author --><meta name="author" content="Nikko Renolds" />
    <!-- Description --><meta name="description" content="A3Playerstats" />  
    <!-- Title --><title>A3Playerstats | Player <?php echo $_GET['pid'];?></title>
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
                    <?php if($user=Database::Query('SELECT * FROM players WHERE pid=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>

                        <!--breadcrumbs-->
                        <div class="card-header p-0 a3ps-breadcrumbs">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 a3ps-breadcrumb-content-after a3ps-background"> 
                                    <li class="breadcrumb-item text-light" aria-current="page"><a href="index.html">Search</a></li> 
                                    <li class="breadcrumb-item text-light" aria-current="page"><a href="result.php">Results</a></li> 
                                    <li class="breadcrumb-item text-light active" aria-current="page"><?php echo $user['name'];?></li> 
                                </ol>
                            </nav>
                        </div>
                        
                        <!-- -->
                        <div class="card-body text-center">

                            <!--Top row-->
                            <div class="row" > 
                                <!--Player Details-->
                                <div class="col-md-6">
                                    <div class="a3ps-colbox">
                                        <h2>Player Details</h2> &nbsp;
                                        <p>Name: <a href="https://www.google.com/search?q=<?php echo $user['name'];?>"><span style="color: #ed7a16"><?php echo $user['name'];?></span></a></p>
                                        <p>SteamID: <a href="https://steamcommunity.com/profiles/<?php echo $user['pid'];?>"><span style="color: #ed7a16"> <?php echo $user['pid'];?></span></a></p>
                                        <p>Last Seen: <span><?php echo PlayerInfo::DisplayDays($user['last_seen']);?></span></p>  
                                        <p>Joined: <span><?php echo PlayerInfo::DisplayDays($user['insert_time']);?></span></p>  
                                    </div>
                                </div>

                                <!--Cash Information-->
                                <div class="col-md-6">
                                    <div class="a3ps-colbox">
                                        <h2>Cash Information</h2> &nbsp;
                                        <p>Bank: <span><?php echo PlayerInfo::DisplayMoney($user["bankacc"]);?></span></p>
                                        <p>Cash: <span><?php echo PlayerInfo::DisplayMoney($user["cash"]);?></span></p>
                                        <p>Gang: <span><?php echo PlayerInfo::DisplayMoney(Database::GangBank($user["pid"]));?></span></p> 
                                    </div>
                                </div>
                            </div>
                            
                            <!--Middle row-->
                            <div class="row">

                                <!--Faction Details-->
                                <div class="col-md-3">
                                    <div class="a3ps-colbox">
                                        <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse-factions" aria-expanded="false" aria-controls="collapse-factions">
                                            <span style="color: white">Faction Details</span>
                                            <span class="dropdown" aria-hidden="true"></span>
                                        </a></p> 
                                        <div class="collapse" id="collapse-factions">
                                            <p style="font-size: 18px;">Staff: <span style="color: red"><?php echo (int)$user['adminlevel']>0 ? "yes" : "no";?></span></p>
                                            <p style="font-size: 18px;">Police: <span style="color: blue"><?php echo (int)$user['coplevel']>0 ? "yes" : "no";?></span></p>
                                            <p style="font-size: 18px;">NHS: <span style="color: green"><?php echo (int)$user['mediclevel']>0 ? "yes" : "no";?></span></p>
                                        </div>
                                    </div>
                                </div>

                                <!--House Details-->
                                <div class="col-md-3">
                                    <div class="a3ps-colbox">
                                        <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse-houses" aria-expanded="false" aria-controls="collapse-houses">
                                            <span style="color: white">House Details</span>
                                            <span class="dropdown" aria-hidden="true"></span>
                                        </a></p>
            
                                        <div class="collapse" id="collapse-houses">
                                            <?php if($userhouses=Database::Query('SELECT * FROM houses WHERE owned="1" AND pid=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>  
                                                <?php foreach($userhouses as $userhouse): ?>
                                                <h4><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> House ID: <?php echo $userhouse['id']?></h4> 
                                                <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Has Garage: <?php echo $userhouse['garage'] == 1 ? "Yes" : "No" ?></h4>
                                                <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Purchased: <?php echo PlayerInfo::DisplayDays($userhouse['insert_time']);?></h4> 
                                                <?php endforeach; ?>  
                                            <?php else: ?> 
                                                <h4><p>No Houses</p></h4>  
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    
                                </div>

                                <!--Vehicle Details-->
                                <div class="col-md-3">
                                    <div class="a3ps-colbox">
                                        <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse-vehicles" aria-expanded="false" aria-controls="collapse-vehicles">
                                            <span style="color: white">Vehicle Details</span>
                                            <span class="dropdown" aria-hidden="true"></span>
                                        </a></p>
                                        <div class="collapse" id="collapse-vehicles">
                                            <?php if($uservehicles=Database::Query('SELECT * FROM vehicles WHERE pid=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>  
                                                <?php foreach($uservehicles as $uservehicle): ?>
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Vehicle ID: <?php echo $uservehicle['id']?></h4>
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ClassName: <?php echo $uservehicle['classname']?></h4>
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Plate: <?php echo $uservehicle['plate']?></h4>
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Purchased: <?php echo PlayerInfo::DisplayDays($uservehicle['insert_time']);?></h4>
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Type: <?php echo $uservehicle['type']?></h4><br>  
                                                <?php endforeach; ?>  
                                            <?php else: ?> 
                                                <h4><p>No Vehicles</p></h4>  
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>

                                <!--Crime Details-->
                                <div class="col-md-3">
                                    <div class="a3ps-colbox">
                                        <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse-crimes" aria-expanded="false" aria-controls="collapse-crimes">
                                            <span style="color: white">Crime Details</span>
                                            <span class="dropdown" aria-hidden="true"></span>
                                        </a></p>
                                        <div class="collapse" id="collapse-crimes">

                                            <!-- <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Serving Time: <?php echo $user['arrested'] == 1 ? "Yes" : "No";?></h4> -->
                                            <?php if($usercrimes=Database::Query('SELECT * FROM wanted WHERE active="1" AND wantedID=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>  
                                                <?php foreach($usercrimes as $usercrime): ?> 
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Known As: <?php echo $usercrime['wantedName']?></h4>
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Crimes: <?php echo $usercrime['wantedCrimes']?></h4>
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Bounty: <?php echo $usercrime['wantedBounty']?></h4><br>  
                                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Offence Occured: <?php echo PlayerInfo::DisplayDays($usercrime['insert_time']);?></h4>  
                                                <?php endforeach; ?>  
                                            <?php else: ?> 
                                                <h4><p>No Crimes</p></h4>  
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!--Bottom row-->
                            <div class="row">

                                <!--Civ licenses-->
                                <div class="col-md-4">
                                    <div class="a3ps-colbox">
                                        <h1>Civ licenses</h1>
                                        <?php foreach(PlayerInfo::DisplayLicenses($user["civ_licenses"]) as $civ_license): ?>
                                            <span class='a3ps-playerlicense a3ps-playerlicense-<?php echo $civ_license[1]==1?"true":"false";?>'><?php echo $civ_license[0];?></span> 
                                        <?php endforeach; ?>  
                                    </div> 
                                </div>

                                <!--Cop licenses-->
                                <div class="col-md-4">
                                    <div class="a3ps-colbox">
                                        <h1>Cop licenses</h1>
                                        <?php foreach(PlayerInfo::DisplayLicenses($user["cop_licenses"]) as $cop_license): ?>
                                            <span class='a3ps-playerlicense a3ps-playerlicense-<?php echo $cop_license[1]==1?"true":"false";?>'><?php echo $cop_license[0];?></span>  
                                        <?php endforeach; ?> 
                                    </div> 
                                </div>

                                <!--Med licenses-->
                                <div class="col-md-4">
                                    <div class="a3ps-colbox">
                                        <h1>Med licenses</h1>
                                        <?php foreach(PlayerInfo::DisplayLicenses($user["med_licenses"]) as $med_license): ?> 
                                            <span class='a3ps-playerlicense a3ps-playerlicense-<?php echo $med_licenses[1]==1?"true":"false";?>'><?php echo $med_licenses[0];?></span> 
                                        <?php endforeach; ?>  
                                    </div> 
                                </div> 

                            </div>  
                                        
                        </div>

                    <?php else: ?>  
                        <div class="card-body text-center">
                            <h1 class="text-center"> No results found for: <?php echo $_GET['pid'];?></h1>
                        </div>
                    <?php endif; ?> 
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