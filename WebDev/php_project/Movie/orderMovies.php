<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/12/2016
 * Time: 10:36 PM
 */
require_once('db_connection.php');
require_once('classes/Movie.php');
if (!isset($_SESSION)) {
    session_start();
}
$json = file_get_contents('php://input');
$json_data=json_decode($json);
if(!isset($json_data->selected)){
    $selected='Alphabetically';
}
else
{
    $selected=$json_data->selected;
}
if(isset($json_data->selected))
{
    if ($selected !== 'Alphabetically' && $selected !== 'Rating' && $selected !== 'Genre')
    {
        header("Location: index.php");
    }

}



if($selected==='Genre')
{
    if(!isset($json_data->selCategory))
    {
        $category_name='Action';
    }
}
if(!isset($json_data->value))
{
    $value="Ascending";
}
else
{
    $value = $json_data->value;
}
switch($selected){

    case 'Alphabetically':{

        switch($value) {
            case "Ascending": {
                $my_query = "SELECT movie_id, movie_name,movie_date,movie_img,movie_synopsis, category_name from movie natural join movie_categories natural join category order by movie_name";
                break;
            }
            case "Descending":{
                $my_query = "SELECT movie_id, movie_name,movie_date,movie_img,movie_synopsis, category_name from movie natural join movie_categories natural join category order by movie_name DESC";
                break;
            }
        }
        break;

    }
    case 'Rating': {

        switch($value){
            case "Ascending": {
                $my_query = "SELECT movie.movie_id,movie_name,movie_date,movie_img,movie_synopsis FROM movie Left outer join rating on movie.movie_id = rating.movie_id group by movie.movie_id order by IFNULL(avg(movie_rating),0),movie_name";

                break;
            }
            case "Descending":{
                $my_query = "SELECT movie.movie_id,movie_name,movie_date,movie_img,movie_synopsis FROM movie Left outer join rating on movie.movie_id = rating.movie_id group by movie.movie_id order by IFNULL(avg(movie_rating),0) DESC,movie_name";
                break;
            }
        }
        break;
    }
    case 'Genre': {
        $category_name = $json_data->selCategory;

        switch ($value){
            case 'Ascending':{
                $my_query="SELECT movie_id, movie_name,movie_date,movie_img,movie_synopsis, category_name from movie natural join movie_categories natural join category WHERE category.category_name = '$category_name' group by movie.movie_name order by movie.movie_name ASC";
                break;
            }
            case 'Descending':{
                $my_query="SELECT movie_id, movie_name,movie_date,movie_img,movie_synopsis, category_name from movie natural join movie_categories natural join category WHERE category.category_name = '$category_name' group by movie.movie_name order by movie.movie_name DESC";
                break;
            }
        }
        break;

    }
}

$result = $dbc->query($my_query);
$rows = array();
$movieArray=[];
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
    if(array_key_exists($row["movie_id"],$movieArray ))
    {
        $movieArray[$row["movie_id"]]->addCategory($row["category_name"]);
    }
    else
    {
        $movie = new Movie($row["movie_id"], $row['movie_name'], $row['movie_date'], $row['movie_img'], $row['movie_synopsis']);
        $movie->addCategory($row["category_name"]);
        $movieArray[$row['movie_id']] = $movie;
    }
}
$_SESSION['movies']=$movieArray;
$_SESSION['selected1']=$selected;
$_SESSION['selected2']=$value;
if(isset($category_name)){
    $_SESSION['selCategory']=$category_name;
}