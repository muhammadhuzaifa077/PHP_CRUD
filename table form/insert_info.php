<?php
include('dbconfiguration.php');

$field_error1="";
$field_error2="";
$field_error3="";
$field_error4="";

function sanitized_data($data)
{
$data = trim($data);
$data = stripcslashes($data);
$data = htmlspecialchars($data , ENT_QUOTES);
return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = sanitized_data($_POST["name"]);
    $email =sanitized_data($_POST["email"]);
    $pwd = sanitized_data($_POST["pwd"]);
    $comp = sanitized_data($_POST["company"]);

    $insert = "INSERT INTO `form`( `name`, `email`, `pswd`, `company`) VALUES ('$name','$email','$pwd','$comp')";
    $inserted = $conn->query($insert);

    if($inserted == true){
        ?>
            <script>
                window.alert("information inserted successfully");
            </script>
        <?php
    }
    else
    {
        ?>
            <script>
                window.alert("failed to insert data");
            </script>
        <?php
    }

    
    if(empty($_POST["name"])){
        $field_error1 = "!This field is not empty";
    }
    
    if(empty($_POST["email"])){
        $field_error2 = "!This field is not empty";
    }




    if(empty($_POST["pwd"])){
        $field_error3 = "!This field is not empty";
        $pwd = $_POST["pwd"];
      }

      $uppercase = preg_match('@[A-Z]@', $pwd);
      $lowercase = preg_match('@[a-z]@', $pwd);
      $number    = preg_match('@[0-9]@', $pwd);
      $specialChars = preg_match('@[^\w]@', $pwd);
  
      if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
          $field_error3= "!Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
      }
      else{
         $field_error3= "<p>Strong password.</p>";
      } 
 



    if(empty($_POST["company"])){
        $field_error4 = "!This field is not empty";
    }


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
    <style>
    span{
        color : red;
    }
    p{
        color:green;
    }
  </style>
</head>
  <body>
    <h1 style="text-align:center;">Information inserted form</h1>
    <div class="container">
        <form action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"]));?>" method="POST">
            <div class="form-group">
                Name : <input type="text" name="name" class="form-control">
                <span ><?php echo ($field_error1);?></span>
                <br>
                Email : <input type="email" name="email" class="form-control">
                <span ><?php echo ($field_error2);?></span>
                <br>
                Password : <input type="password" name="pwd" class="form-control">
                <span ><?php echo ($field_error3);?></span>
                <br>
                Company : <input type="text" name="company" class="form-control">
                <span ><?php echo ($field_error4);?></span>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">INSERT</button>
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