<?php
    include('dbconfiguration.php');

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $select="SELECT * FROM `form` WHERE `id` = $id";
        $selected =$conn->query($select);
        $info =mysqli_fetch_array($selected);

        $id = $info["id"];
        $name = $info["name"];
        $email = $info["email"];
        $pwd = $info["pswd"];
        $comp = $info["company"];
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <h1 style="text-align:center;">Updated form</h1>
  <div class="container">
    <form action="" method="POST">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control"><br>
            <input type="text" name="name" value="<?php echo $name;?>" class="form-control"><br>
            <input type="email" name="email" value="<?php echo $email;?>" class="form-control"><br>
            <input type="password" name="pswd" value="<?php echo $pwd;?>" class="form-control"><br>
            <input type="text" name="company" value="<?php echo $comp;?>" class="form-control"><br>
            <button type="submit" name="submit" class="btn btn-success">update</button>
        </div>  
    </form>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php
    if(isset($_POST["submit"]))
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pswd"];
        $comp = $_POST["company"];

        $update="UPDATE `form` SET `name`='$name',`email`='$email',`pswd`='$pwd',`company`='$comp'";
        $updated= $conn->query($update);

        if($updated== true){
            ?>
                <script>
                    window.alert("data updated succenfully");
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    window.alert("failed to update");
                </script>
            <?php
        }
    }
?>