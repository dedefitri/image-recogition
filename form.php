<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Upload</title>
    <style>
        body{
            background-image:url(landingpageawal-01.png);
            background-size:cover;
            background-attachment: fixed;
        }
        .container {
            padding: 16px;
            width:35%;
            border:1pt solid #ccc;
            border-radius:10px;
            margin:10px auto;
            margin-top:130px;
            font-family: arial;
            background-color:white;
        }
    </style>
</head>
<body>
<div class="container">
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleFormControlInput1">Judul</label>
        <input type="Nama" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="masukkan nama">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Tambahkan objek deteksi</label>
        <textarea class="form-control" name="objek" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <input type="file" name="file" />
    <input type="submit" name="submit" value="upload" />
</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>