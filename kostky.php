<?php include "_partials/header.php"?>

<body>
    <?php 
    //zacinam session abych mohl udryovat score hracu
    session_start();

    //kdzy mackam tlacitko reset mazu session abych se zbavil hodnot score
    if(array_key_exists("reset", $_GET)){
        unset($_SESSION["spusteni"]);
    }

    //tady mackam tlacitko start abych zacal ukladat score do hodnoty hrac1,2 
    if(!isset($_SESSION["spusteni"])){
        $_SESSION["spusteni"] = true;
        $_SESSION["hrac1"] = 0;
        $_SESSION["hrac2"] = 0;
        $_SESSION["celkovyVitez"] = false;
    }


    echo "<div class=kostky>";
    //tady generuju nahodne cisla hodu kostek a zaroven musi byt pravdiva podminka, ze jeste neni celkovy vitez
    if(array_key_exists("hod", $_GET)&&$_SESSION["celkovyVitez"] === false){
        $kostka1 = rand(1, 6);
        $kostka2 = rand(1, 6);


        //prirazuju img s hodnotou cisla na kostce 1
        if($kostka1 === 1){
            echo "<img class=rotate src='img/kostka1.png' width=200>";
        }elseif($kostka1 === 2){
            echo "<img class=rotate src='img/kostka2.png' width=200>";
        }elseif($kostka1 === 3){
            echo "<img class=rotate src='img/kostka3.png' width=200>";
        }elseif($kostka1 === 4){
            echo "<img class=rotate src='img/kostka4.png' width=200>";
        }elseif($kostka1 === 5){
            echo "<img class=rotate src='img/kostka5.png' width=200>";
        }else{
            echo "<img class=rotate src='img/kostka6.png' width=200>";
        }

        echo " ";
        echo "<hr>";
        
    
        //prirazuju img s hodnotou cisla na kostce 2
        if($kostka2 === 1){
            echo "<img src='img/kostka1.png' width=200>";
        }elseif($kostka2 === 2){
            echo "<img src='img/kostka2.png' width=200>";
        }elseif($kostka2 === 3){
            echo "<img src='img/kostka3.png'width=200>";
        }elseif($kostka2 === 4){
            echo "<img src='img/kostka4.png' width=200>";
        }elseif($kostka2 === 5){
            echo "<img src='img/kostka5.png' width=200>";
        }else{
            echo "<img src='img/kostka6.png' width=200>";
        }

        echo "</div>";

        echo "<div class=vyhodnoceni>";
        //vyhodnocovani viteze
        if($kostka1 > $kostka2){
            echo "Tvůj hod je $kostka1  <br> ";
            echo "Soupeř hodil $kostka2  <br>";
            echo "Vyhráváš ty <br>";
            $_SESSION["hrac1"]++;
        
        }elseif($kostka2 > $kostka1){
            echo "Tvůj hod je $kostka1 <br>";
            echo "Soupeř hodil $kostka2 <br>";
            echo "Vyhráva protivník <br>";
            $_SESSION["hrac2"]++;
        
        }else{
            echo "Tvůj hod je $kostka1 <br>";
            echo "Soupeř hodil $kostka2 <br>";
            echo "Je to remíza <br>";
        }

        //vypis dat o score
        echo "Tvé score je ". $_SESSION["hrac1"]."<br>";
        echo "Soupeřovo score je ". $_SESSION["hrac2"]. "<br>";
    };


    //tady vyhodnocuji celkoveho vyteze 
    if($_SESSION["hrac1"] === 3){
        echo "<h1>Vyhráváš hru!<h1> <br>";
        $_SESSION["celkovyVitez"] = true;
    }elseif($_SESSION["hrac2"] === 3){
        echo "<h1>Prohrál jsi<h1>";
        $_SESSION["celkovyVitez"] = true;
    }
    
    
    ?>


    <!-- formular pro tlacitka -->
    <form method="get">
    <button name="hod">Hod kostkou</button>
    <button name="reset">Reset</button><br>
    <a href="index.php">Zpět</a>
    </form>

    
    </div>
</body>
</html>



