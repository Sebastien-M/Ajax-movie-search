<?php
$api_key = file_get_contents("auth.txt");
$poster_path = "http://image.tmdb.org/t/p/w185/";
$query = $_REQUEST["q"];
$query = str_replace(" ", "%20", $query);
$q = $query;
    if ($q !== ""){
        $content = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=3".$api_key."&language=en-US&query=".$query."&page=1&include_adult=false");
        $json = json_decode($content, true);
        
            try{
                for ($i=0; $i < 10; $i++) { 
                    if (isset($json['results'][$i])){
                        $poster ="http://image.tmdb.org/t/p/w185/".$json['results'][$i]['poster_path'];
                        echo "<div class='suggestcontain'>".
                        "<p class='movie'>".
                        $json['results'][$i]['title'].
                        "</p>".
                        "<img src='".$poster."' alt='poster'>"
                        ."</div>";
                    }
                }
            }
            catch(Exception $e){
                echo "Pas de film trouvé";
            }
        }
?>