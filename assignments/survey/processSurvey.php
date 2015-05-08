<?php
    $complete = FALSE;
    $file = fopen("results.txt", "r");

    $results = array();

    //read file if file exists 
    if ($file){
        while($line = fgets($file)){
           array_push($results, intval($line));
           //echo $line . "<br/>";
        }
        /*for ($i = 0; $i < 16; $i++){
            echo $i . " " . $results[$i] . "<br/>";
        }*/
    }else{
        echo "error reading results";
        exit;
    }

    fclose($file);

    //tally results
    if (isset($_POST["one"])){
        $results[intval($_POST["one"])]++;
        $complete = TRUE;
    }
    if (isset($_POST["two"])){
        $results[intval($_POST["two"])]++;
        $complete = TRUE;
    }
    if (isset($_POST["three"])){
        $results[intval($_POST["three"])]++;
        $complete = TRUE;
    }
    if (isset($_POST["four"])){
        $results[intval($_POST["four"])]++;
        $complete = TRUE;
    }
    
    //write updated counts to file
    $file = fopen("results.txt", "w");

    //write file if it is open and set cookie to indicate that the 
    //survey was already taken
    if ($file){
        for ($i = 0; $i < 16; $i++){
            fwrite($file, $results[$i] . "\n");

        }
    }
    fclose($file);

    //set cookie to indicate that the survey was complete
    if ($complete){
        setcookie("complete", 1);
    }

    //proceed to results page
    header('Location: surveyResults.php');
    ?>