<?php
    if(isset($_COOKIE["complete"]) && $_COOKIE["complete"] == 1){
        header('Location: surveyResults.php');
        exit;
    }
    setcookie("complete", 0)
?>
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

    <div id="inner">
        <h1>Awesome Survey</h1>
        <form id="survey" action="processSurvey.php" method="post">
            What is your favorite food?<br/>
            <input type="radio" name="one" value="0"> Pizza<br/>
            <input type="radio" name="one" value="1"> Burgers<br/>
            <input type="radio" name="one" value="2"> Pasta<br/>
            <input type="radio" name="one" value="3"> Steak<br/><br/>
            
            What is your favorite fast food chain?<br/>
            <input type="radio" name="two" value="4"> Cafe Rio<br/>
            <input type="radio" name="two" value="5"> McDonald's<br/>
            <input type="radio" name="two" value="6"> Burger King<br/>
            <input type="radio" name="two" value="7"> Taco Bell<br/><br/> 
            
            What is your age?<br/>
            <input type="radio" name="three" value="8"> 0-17<br/>
            <input type="radio" name="three" value="9"> 18-29<br/>
            <input type="radio" name="three" value="10"> 30-39<br/>
            <input type="radio" name="three" value="11"> 40+<br/><br/>
            
            Where are you from?<br/>
            <input type="radio" name="four" value="12"> North<br/>
            <input type="radio" name="four" value="13"> South<br/>
            <input type="radio" name="four" value="14"> East<br/>
            <input type="radio" name="four" value="15"> West<br/>

            <input type="reset">
            <input type="submit">
                   
        </form>
        <a href="surveyResults.php">Skip to results</a>
    </div>
    </body>
</html>
