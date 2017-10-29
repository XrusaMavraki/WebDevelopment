<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/14/2016
 * Time: 4:27 PM
 */
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 5/30/2016
 * Time: 11:03 AM
 */
require_once('classes/Movie.php');
require_once('db_connection.php');
session_start();
if (!isset($_SESSION['selected1']))
{
    include('orderMovies.php');
}
$movieArray=$_SESSION['movies'];


?>


<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
    <link rel="stylesheet" type="text/css" href="MovieStyle.css">
    <script type="text/javascript" src="indexJs.js"></script>

</head>

<body>

<div id="banner">

    <table id="bannerComponents">

        <td id="left">
            <h1 onclick="document.location.href='index.php'">Movie Junkie!</h1>
        </td>

        <td id="right">
            <form id="login" action="Login.php" method="post">
                <?php
                if(isset($_SESSION['error'])){
                    switch ($_SESSION['error']){
                        case "login_error_1":
                        {
                            ?>
                            <label class="login_failure">Λάθος κωδικός ή όνομα χρήστη</label>
                            <?php
                            break;
                        }
                        case "login_error_2":
                        {
                            ?>
                            <label class="login_failure">Κάτι πήγε στραβά. Παρακαλώ ξαναπροσπαθείστε</label>
                            <?php
                            break;
                        }
                    }
                }
                ?>

                <?php
                if (!isset($_SESSION['userName']))
                {
                    ?>
                    <table>
                        <td>
                            <input  type="text" id="username" name="userName" required placeholder="Όνομα χρήστη">
                        </td>
                        <td>
                            <input  type="password" id="password" name="passWord" pattern="(?=.*\d)(?=.*[A-Z]).{5,}" required placeholder="Κωδικός " title="Ο κωδικός πρέπει να περιέχει τουλάχιστον 5 χαρακτήρες και να περιέχει τουλάχιστον ένα κεφαλαίο γράμμα">
                        </td>
                        <td>
                            <button type="submit" name="login" class="textonlybutton"> Είσοδος </button>
                        </td>
                        <td>
                            <button type="submit" name="register" class="textonlybutton"> Εγγραφή </button>
                        </td>
                    </table>
                    <?php
                }
                else
                {
                    ?>
                    <table>
                        <td>
                            <label id="usernamelabel"><?= $_SESSION['userName'] ?></label>
                        </td>
                        <td>
                            <button type="submit" name="logout" class="textonlybutton"> Έξοδος</button>
                        </td>
                    </table>
                <?php } ?>

            </form>
        </td>
    </table>
</div>

<div id="container">


    <select id="orderBy" onchange="orderBy()"> Order by:

        <option value="Alphabetically" <?= $_SESSION['selected1'] === 'Alphabetically' ? "selected" : "" ?>> Alphabetically </option>
        <option value="Rating" <?= $_SESSION['selected1'] === 'Rating' ? "selected" : "" ?>> Rating</option>
        <option value="Genre" <?= $_SESSION['selected1'] === 'Genre' ? "selected" : "" ?>>Genre</option>
    </select>


    <select id="AscDesc"   onchange="orderBy()"> 
        <option value="Ascending"  <?= $_SESSION['selected2'] === 'Ascending' ? "selected" : "" ?>> Ascending</option>
        <option value="Descending" <?= $_SESSION['selected2'] === 'Descending' ? "selected" : "" ?>> Descending</option>
    </select>

    <select id="Genre"  <?= $_SESSION['selected1'] === 'Genre' ? 'style="display:block"' :'style="display: none"' ?> onchange="orderBy()">
        <?php
        $Movie='Movie';
        $array=$Movie::getAllMovieCategories($dbc);
        foreach($array as $counter=>$category) {

                ?>
                <option value=<?= $category  ?> <?=$_SESSION['selCategory']===$category? "selected" : "" ?>> <?= $category ?> </option>
                <?php

        }
        ?>
    </select>

    <?php foreach ($movieArray as $v){ ?>
        <table class="movie" id="<?= $v->getMovieName()?>" height="170" onclick="document.location.href='movie_picked.php?id=<?=  $v->getMovieId()?>'">
            <td width="100">
                <img class="thumbnail" src=<?=$v->getMovieImg()?> height="150" width="100" onclick="document.location.href='movie_picked.php?id=<?=  $v->getMovieId()?>'"/>
            </td>

            <td>
                <table class="info">
                    <tr>
                        <td class="title"> <?= $v->getMovieName() ?> </td>
                    </tr>
                    <tr>
                        <td class="genres">
                            <?php
                            $i = 1;
                            foreach($v->getMovieCategories() as $cat) {
                                if ($i > 1) {
                                    echo ", ";
                                }
                                echo $cat;
                                $i = $i + 1;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="rating">
                            <?php
                            $avgRating= $v->getAvgRating($dbc);
                            $avgRatingRound= round($avgRating);
                            ?>
                            <fieldset class="fixed_star_rating">
                                <input type="radio" id="star5" name="rating<?=$v->getMovieId($dbc)?>" value="5" disabled <?= $avgRatingRound == 5 ? "checked" : ""?>/><label for="star5">&#9733;</label>
                                <input type="radio" id="star4" name="rating<?=$v->getMovieId($dbc)?>" value="4" disabled <?= $avgRatingRound == 4 ? "checked" : ""?>/><label for="star4">&#9733;</label>
                                <input type="radio" id="star3" name="rating<?=$v->getMovieId($dbc)?>" value="3" disabled <?= $avgRatingRound == 3 ? "checked" : ""?>/><label for="star3">&#9733;</label>
                                <input type="radio" id="star2" name="rating<?=$v->getMovieId($dbc)?>" value="2" disabled <?= $avgRatingRound == 2 ? "checked" : ""?>/><label for="star2">&#9733;</label>
                                <input type="radio" id="star1" name="rating<?=$v->getMovieId($dbc)?>" value="1" disabled <?= $avgRatingRound == 1 ? "checked" : ""?>/><label for="star1">&#9733;</label>
                            </fieldset>
                            <span id="numericalRating"><?= $avgRating?></span>

                        </td>
                    </tr>
                </table>
            </td>

        </table>
    <?php } ?>

</div>

</body>

</html>
