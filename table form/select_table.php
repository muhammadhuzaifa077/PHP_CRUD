<?php
    include('dbconfiguration.php');

    $select= "SELECT * FROM `form`";
    $selected = $conn->query($select);


    ///delete button code//

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $delete="DELETE FROM `form` WHERE id=$id";
        $deleted = $conn->query($delete);
    }

    //DELETE button code//
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

  <h1 style="text-align:center;">Table information .</h1>
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Company</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    if($selected->num_rows >0){
                        while($info=$selected->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $info["id"]?></td>
                                <td><?php echo $info["name"]?></td>
                                <td><?php echo $info["email"]?></td>
                                <td><?php echo $info["pswd"]?></td>
                                <td><?php echo $info["company"]?></td>

                                <td>
                                    <a href="update_form.php?id=<?php echo $info["id"]?>" class="btn btn-success">Edit</a>
                                    <a href="select_table.php?id=<?php echo $info["id"]?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </tbody>
        </table>

    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>