<?php

//$post = "[img={$result2['ImageID']}]";

// echo $post;

//echo '<br><br><br><br><br><br>';


if(preg_match('/\[img=(\d+)\]/', $post, $id)){


//print_r($id);


$sql = "SELECT * FROM images WHERE ImageId = {$id[1]}";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
        $url = $row['Nuoroda'];
   }
}
}

$url = $url ?? 'netrinti/Default.png';


$img = $Settings['url'].'Admin/'.$url;


$post = preg_replace('/\[img=(\d+)\]/', '<img src="'.$img.'">', $post);

//echo '<br><br>';
echo $post;