<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/1/2016
 * Time: 9:39 PM
 */
require_once('classes/Movie.php');
require_once ('db_connection.php');
session_start();
if(!isset($_SESSION['movies'])||!isset($_GET['id'])){
    header("Location: index.php");
}
$movieArray=$_SESSION['movies'];
$movie=$_GET['id'];

$v= $movieArray[$movie];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$v->getMovieName()?></title>
    <link rel="stylesheet" type="text/css" href="moviePicked.css">
    <script type="text/javascript" src="indexJs.js"> </script>
</head>
<body>
<div id="banner">

    <table>

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
                if (!isset($_SESSION['userName'])){
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
<div class="container" id="<?=  $v->getMovieId()?>">


    <table class="movie" id="<?= $v->getMovieName()?>">
        <td>
            <?php if(!empty($v->getMovieImg())){?>
                <img id="thumbnail" src="<?= $v->getMovieImg()?>"  height="300" width="200"/>
                <?php
            }
            ?>
        </td>
        <td>
            <table class="info">
                <tr>
                    <td>
                        <label class="title"> <?= $v->getMovieName() ?> </label>
                    </td>
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
                    <td>
                        <?php
                        if (!isset($_SESSION['userName'])){
                            $k= $v->getAvgRating($dbc);
                            $k = round($k);
                            ?>
                            <label id="rating_label">Average rating: </label>
                            <fieldset class="fixed_star_rating">
                                <input type="radio" id="star5" name="rating" value="5" disabled <?= $k == 5 ? "checked" : ""?>/><label for="star5">&#9733;</label>
                                <input type="radio" id="star4" name="rating" value="4" disabled <?= $k == 4 ? "checked" : ""?>/><label for="star4">&#9733;</label>
                                <input type="radio" id="star3" name="rating" value="3" disabled <?= $k == 3 ? "checked" : ""?>/><label for="star3">&#9733;</label>
                                <input type="radio" id="star2" name="rating" value="2" disabled <?= $k == 2 ? "checked" : ""?>/><label for="star2">&#9733;</label>
                                <input type="radio" id="star1" name="rating" value="1" disabled <?= $k == 1 ? "checked" : ""?>/><label for="star1">&#9733;</label>
                            </fieldset>
                            <span id="numericalRating"><?= $k?></span>
                            </label>
                            <?php
                        }
                        else {
                            $k= $v->getMyRating($_SESSION['userName'],$dbc);
                            $k = round($k);
                            ?>
                            <label id="rating_label">Your rating: </label>

                            <fieldset class="star_rating">
                                <input type="radio" id="star5" name="rating" value="5" onchange="handleStars(<?=$movie?>)" <?= $k == 5 ? "checked" : ""?>/><label for="star5">&#9733;</label>
                                <input type="radio" id="star4" name="rating" value="4" onchange="handleStars(<?=$movie?>)" <?= $k == 4 ? "checked" : ""?>/><label for="star4">&#9733;</label>
                                <input type="radio" id="star3" name="rating" value="3" onchange="handleStars(<?=$movie?>)" <?= $k == 3 ? "checked" : ""?>/><label for="star3">&#9733;</label>
                                <input type="radio" id="star2" name="rating" value="2" onchange="handleStars(<?=$movie?>)" <?= $k == 2 ? "checked" : ""?>/><label for="star2">&#9733;</label>
                                <input type="radio" id="star1" name="rating" value="1" onchange="handleStars(<?=$movie?>)" <?= $k == 1 ? "checked" : ""?>/><label for="star1">&#9733;</label>
                            </fieldset>
                            <span id="numericalRating"><?= $k?></span>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td id="date">
                        Year: <?= $v->getMovieDate() ?>  </label>
                    </td>
                </tr>
                <tr>
                    <td id="synopsis">
                        Synopsis: <?= $v->getMovieSynopsis() ?>
                    </td>
                </tr>
                </table>
                    </td>
                </table>

</body>
</html>