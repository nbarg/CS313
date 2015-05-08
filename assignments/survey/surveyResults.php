<!DOCTYPE html>
<!--
This doc will hold a survey 
-->
<html>
<head>
    <title>Survey</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="survey.css">
</head>
<body>
    <?php
    $complete = FALSE;
    $file = fopen("results.txt", "r");

    $results = array();

    //read file if file exists 
    if ($file){
        while($line = fgets($file)){
           array_push($results, intval($line));
        }
    }else{
        echo "error reading results";
        exit;
    }

    fclose($file);
    ?>

    <!-- display results -->
<div id="inner">
    <h1>Survey Results</h1>
    <h3>What is your favorite food?</h3>
    <ul>
        <li><?php echo $results[0] . " Votes: "?>Pizza</li>
        <li><?php echo $results[1] . " Votes: "?>Burgers</li>
        <li><?php echo $results[2] . " Votes: "?>Pasta</li>
        <li><?php echo $results[3] . " Votes: "?>Steak</li>
    </ul>

    <h3>What is your favorite fast food chain?</h3>
    <ul>
        <li><?php echo $results[4] . " Votes: "?>Cafe Rio</li>
        <li><?php echo $results[5] . " Votes: "?>McDonald's</li>
        <li><?php echo $results[6] . " Votes: "?>Burger King</li>
        <li><?php echo $results[7] . " Votes: "?>Taco Bell</li>
    </ul>

    <h3>What is your age?</h3>
    <ul>
        <li><?php echo $results[8] . " Votes: "?>0-17</li>
        <li><?php echo $results[9] . " Votes: "?>18-29</li>
        <li><?php echo $results[10] . " Votes: "?>30-39</li>
        <li><?php echo $results[11] . " Votes: "?>40+</li>
    </ul>

    <h3>Where are you from?</h3>
    <ul>
        <li><?php echo $results[12] . " Votes: "?>North</li>
        <li><?php echo $results[13] . " Votes: "?>South</li>
        <li><?php echo $results[14] . " Votes: "?>East</li>
        <li><?php echo $results[15] . " Votes: "?>West</li>
    </ul>
</div>
</body>
</html>
