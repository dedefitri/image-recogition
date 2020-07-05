
<?php
include('config.php');
$result =  mysqli_query($conn, "SELECT * FROM video");
if(isset($result)) {
    while ($data = mysqli_fetch_array($result)) {
        ?>
        <html>
        <head>
         <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <style>
                body {
                    background-image: url(background.png);
                    background-size: cover;
                    background-attachment: fixed;
                }
                .judul{
                    margin-left:10%;
                    margin-top:10%;
                    border-radius: 8px;
                }
            </style>
        </head>
        <body>
        <div class="judul">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-lg-8">
                            <a class="btn btn-success btn-fill" href="detectku.php?id=<?php echo $data['id']; ?>">SCAN!!!</a>
                    </div>
                </div>
                <br><br>
                <div class="row justify-content-md-center">
                    <div class="col-lg-8">
                        <a class="btn btn-success btn-fill" href="dashboard.php">Kembali!!!</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

?>
        </body>
        </html>
