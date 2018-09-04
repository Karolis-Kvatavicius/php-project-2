<?php
$settings['url'] = 'http://www.donata.test/';


$post = '


// [img=58]



// ';

// echo $post;

echo '<br><br><br><br><br><br>';


preg_match('/\[img=(\d+)\]/', $post, $id);





$sql = "SELECT * FROM images WHERE id = {$id[1]}";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
        $url = $row["Nuoroda"];
   }
}



$img = $settings['url'].'Admin/images/'.$url;


$post = preg_replace('/\[img=(\d+)\]/', '<img src="'.$img.'">', $post);


echo $post;