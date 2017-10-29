<?php

/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/1/2016
 * Time: 9:01 PM
 */



class Movie
{
    private $movie_id;
    private $movie_name;
    private $movie_date;
    private $movie_img;
    private $movie_synopsis;
    private $movie_categories=[];

    function __construct($id,$name,$date,$img,$synopsis)
    {
        $this->movie_id=$id;
        $this->movie_name= $name;
        $this->movie_date=$date;
        $this->movie_img=$img;
        $this->movie_synopsis=$synopsis;

    }
    public static function getAllMovieCategories($dbc) {

         $all_movie_categories=[];
        $query="SELECT category_name FROM category";
        $result=mysqli_query($dbc, $query);
        while($row = mysqli_fetch_row($result)) {
            array_push($all_movie_categories, $row[0]);
        }
        return $all_movie_categories;

    }
    function getMyRating($myId,$dbc){
        $stmt = $dbc->prepare('SELECT movie_rating FROM rating WHERE user_id=? AND movie_id=? ');
        $stmt->bind_param('ss', $myId,$this->movie_id);
        $stmt->execute();
        $stmt->store_result();
        $myrating="";
        $stmt->bind_result($myrating);
        $stmt->fetch();
        if($myrating!==""){
            return $myrating;
        }
        else{
            return 0;
        }
    }
    function getAvgRating($dbc)
    {
        $query="SELECT avg(movie_rating) FROM rating where rating.movie_id=$this->movie_id";
        $result= $dbc->query($query);
        $row= $result->fetch_row();
        $avg_rating=0;
        if($row[0]!==NULL){
            $avg_rating= $row[0];
        }
        return round($avg_rating,2);
    }
    function addCategory($category){
        array_push($this->movie_categories,$category );
    }
    /**
     * @return mixed
     */
    public function getMovieName()
    {
        return $this->movie_name;
    }

    /**
     * @return mixed
     */
    public function getMovieDate()
    {
        return $this->movie_date;
    }

    /**
     * @return mixed
     */
    public function getMovieImg()
    {
        return $this->movie_img;
    }

    /**
     * @return mixed
     */
    public function getMovieSynopsis()
    {
        return $this->movie_synopsis;
    }

    /**
     * @return mixed
     */
    public function getMovieCategories()
    {
        return $this->movie_categories;
    }

    /**
     * @return mixed
     */
    public function getMovieId()
    {
        return $this->movie_id;
    }

    

}