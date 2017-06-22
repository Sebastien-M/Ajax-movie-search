<?php
$api_key = file_get_contents("auth.txt");
$query = $_REQUEST["q"];
$query = str_replace(" ", "%20", $query);
$q = $query;
    if ($q !== ""){
        $content = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=3".$api_key."&language=en-US&query=".$query."&page=1&include_adult=false");
        $json = json_decode($content, true);
        if (isset($json['results'][0])){
            try{
                for ($i=0; $i < 10; $i++) { 
                    echo $json['results'][$i]['title']."<br/>";
                }
            }
            catch(Exception $e){
                echo "Pas de film trouvé";
            }
        }
        else{
            echo "Pas de film trouvé";
        }   
}
?>