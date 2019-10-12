<!DOCTYPE html>
<html>
  <head>
    <title>A3Playerstats | Home</title>
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
                <li class="breadcrumb-item text-light active" aria-current="page">Home</li>   
            </ol>   
        </nav>
  
        <!--Curved sitename-->
        <div class=""> 
            <p id="simple_arc" style="text-align: center; margin-top: 100px; font-size: 6em;font-weight: 500; text-shadow: 0px 0px 13px rgba(0, 0, 0, .1);letter-spacing: 1rem;">
                ARMA
            </p>
            <p style="text-align: center; margin-top: 100px; margin-bottom:150px;font-size: 3em; color: white; font-weight: 500; text-shadow: 0px 0px 13px rgba(0, 0, 0, .1);letter-spacing: 1rem;">
                PLAYERSTATS
            </p>
        </div>
      
        <!--Search box-->
        <div class="text-center mb-4">
            <div class="search" style="text-align: center;">
                <form id="search" method="get" action="search.php">
                    <input placeholder="Search for PlayerName / SteamID / NumberPlate..." id="searchBar" name="searchKey" type="text">
                    <input value="Search" type="submit">
                </form>
            </div>
        </div>
 
    </div> 
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assests/js/circletype.min.js"></script>
    <script type="text/javascript"> $(document).ready(function() {new CircleType(document.getElementById('simple_arc')).radius(1200);}); </script> 
</body>


</html>