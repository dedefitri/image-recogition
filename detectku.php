<!--
 Copyright (c) 2018 ml5

 This software is released under the MIT License.
 https://opensource.org/licenses/MIT
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.dom.min.js"></script>
    <script src="https://unpkg.com/ml5@0.1.1/dist/ml5.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    a {
        color: hotpink;
    }
    </style>
</head>
<body>
<p id="status">Loading Model...</p>

Temukan objek berikut :<b><label id="quiz">
        <?php
        include('config.php');
        $id = $_GET['id'];
        $result =  mysqli_query($conn, "SELECT * FROM video WHERE id='$id'");
        if(isset($result)) {
            while ($data = mysqli_fetch_array($result)) {
                echo "object,".$data['objek'];
                $categories = $data['objek'];
                $path_video = $data['path'];
            }
        }

        ?></label></b><br>

<?php
$cats = explode(",", $categories );
foreach($cats as $cat) {
    $cat = trim($cat);
    echo "<label id=\"" . $cat . "\">- Object yang dicari: ".$cat."</label><br>";
}

?>

<p id=linkpath><b><?= $path_video; ?></b></p>
<a id="linkpath" href="<?= $path_video; ?>"><?= $categories; ?></a>
<label id="objectDetection">Object</label>
<iframe width="560" height="315" src="https://www.youtube.com/embed/c7aZs1iG_VU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<script src="sketch.js"></script>
</body>
</html>
