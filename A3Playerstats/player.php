<!DOCTYPE html> 
<html>
  <head>
    <title>A3Playerstats | Player <?php echo $_GET['pid'];?></title>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assests/css/style.css"> 
  </head>

<!--header-->
 <header> 
    <?php require_once("globals.php"); ?>
    <?php if(!$_GET['pid']){ header("Location: index.html"); exit; } ?>

</header>   

<body class="py-2">
    <div class="container"> 

        <?php if($user=Database::Query('SELECT * FROM players WHERE pid=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>  
                    
            <!--Breadcrumb bar-->
            <nav aria-label="breadcrumb">  
                <ol class="breadcrumb breadcrumb-content-after bg-dark ">  
                <li class="breadcrumb-item" aria-current="page"><a href="index.html">Home</a></li>   
                <li class="breadcrumb-item" aria-current="page"><a href="result.php">Result</a></li>  
                <li class="breadcrumb-item text-light active" aria-current="page"><?php echo $user['name'];?></li>   
                </ol>   
            </nav>

            <!--Content-->
            <div class="container-fluid"> 
            
                <!--Top row-->
                <div class="row"> 
                    <!--Player Details-->
                    <div class="col-md-6">
                        <div class="unit">
                            <h2>Player Details</h2>
                            <p>&nbsp</p>
                            <p>Name: <a href="https://www.google.com/search?q=<?php echo $user['name'];?>"><span style="color: #ed7a16"><?php echo $user['name'];?></span></a></p>
                            <p>SteamID: <a href="https://steamcommunity.com/profiles/<?php echo $user['pid'];?>"><span style="color: #ed7a16"> <?php echo $user['pid'];?></span></a></p>
                            <p>Joined: <span><?php echo (int)(((int)date('U') - (int)date('U', strtotime($user['insert_time'])))/86400);?> Days ago</span></p> 
                            <p>Last Seen: <span><?php echo (int)(((int)date('U') - (int)date('U', strtotime($user['last_seen'])))/86400) < 1 ? " Today" : (int)(((int)date('U') - (int)date('U', strtotime($user['last_seen'])))/86400) ." Days Ago";?></span></p>

                        </div>
                    </div>

                    <!--Cash Information-->
                    <div class="col-md-6">
                        <div class="unit">
                            <h2>Cash Information</h2>
                            <p>&nbsp</p>
                            <p>Bank: <span><?php echo strlen($user["bankacc"]) > 1 ? "$ " . $user["bankacc"] : "Nil";?></span></p>
                            <p>Cash: <span><?php echo strlen($user["cash"]) > 1 ? "$ " . $user["cash"] : "Nil";?></span></p>
                            <?php if($usergang=Database::Query('SELECT * FROM gangs WHERE owner=:owner', array(':owner'=>$_GET['pid']))[0]) : ?>  
                                <p>Gang: <span><?php echo strlen($usergang["bank"]) > 0 ? "$ " . $usergang["bank"] : "Nil";?></span></p>
                            <?php else: ?> 
                                <p>Gang: <span>Nil</span></p>
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>

                <!--Middle row-->
                <div class="row">

                    <!--Faction Details-->
                    <div class="col-md-6">
                        <div class="unit">
                            <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                <span style="color: white">Faction Details</span>
                                <span class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"></span>
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
                        <div class="unit">
                            <p><a role="button" style="text-decoration: none" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                <span style="color: white">Vehicle Details</span>
                                <span class="glyphicon glyphicon-chevron-down pull-right" aria-hidden="true"></span>
                            </a></p>
                            <div class="collapse" id="collapse2">
                                <?php if($uservehicles=Database::Query('SELECT * FROM vehicles WHERE pid=:pid', array(':pid'=>$_GET['pid']))[0]) : ?>  
                                    <?php foreach($uservehicles as $uservehicle): ?>
                                    <h4><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Vehicle ID: <?php echo $uservehicle['id']?></h4>
                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ClassName: <?php echo $uservehicle['classname']?></h4>
                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Plate: <?php echo $uservehicle['plate']?></h4>
                                    <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Insert_Time: <?php echo $uservehicle['insert_time']?></h4>
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
                    <div class="col-md-6">
                        <div class="unit">
                            <h1>Civ licenses</h1>
                            <?php foreach(PlayerInfo::GetLicenses($user["civ_licenses"]) as $civ_license): ?>
                                <p style="font-size: 18px;"><?php echo $civ_license[1] == 1 ? $civ_license[0].": <span style='color: green'>Yes</span>" : $civ_license[0].": <span style='color: red'>No</span>";?> </p>
                            <?php endforeach; ?>  
                        </div> 
                    </div>

                     <!--Cop licenses-->
                    <div class="col-md-6">
                        <div class="unit">
                            <h1>Cop licenses</h1>
                            <?php foreach(PlayerInfo::GetLicenses($user["cop_licenses"]) as $cop_license): ?>
                                <p style="font-size: 18px;"><?php echo $cop_license[1] == 1 ? $cop_license[0].": <span style='color: green'>Yes</span>" : $cop_license[0].": <span style='color: red'>No</span>";?> </p>
                            <?php endforeach; ?> 
                        </div> 
                    </div>

                    <!--Med licenses-->
                    <div class="col-md-6">
                        <div class="unit">
                            <h1>Med licenses</h1>
                            <?php foreach(PlayerInfo::GetLicenses($user["med_licenses"]) as $med_license): ?> 
                                <p style="font-size: 18px;"><?php echo $med_licenses[1] == 1 ? $med_licenses[0].": <span style='color: green'>Yes</span>" : $med_licenses[0].": <span style='color: red'>No</span>";?> </p>
                            <?php endforeach; ?>  
                        </div> 
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
    <script type="text/javascript" src="assests/js/circletype.min.js"></script>
</body> 

</html>
