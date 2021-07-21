
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ana Couto :: Waves :: Update Tool</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <style>
      form{ max-width: 450px; margin: 120px auto;}
    </style>
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="update.php" enctype="multipart/form-data">
      <input type="hidden" name="action" value="update">
      <h3 class="h4 mb-3 font-weight-normal">Select CSV File</h3>

      <label for="inputUsername" class="sr-only">File Upload</label>
      <input type="file" id="inputfILE" name="filetoupdate" class="form-control" placeholder="Select File" required autofocus>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>

      <br><br>
    Download Example File.:<br>
    <a href="example.csv" target="blank">example.csv</a>

    </form>


        <?php
      echo $buffer;
    ?>


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>
