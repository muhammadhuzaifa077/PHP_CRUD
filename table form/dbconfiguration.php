<style>
    h6{
        color :#17BF0F;
    }
</style>

<?php
    $server= "localhost";
    $username = "root";
    $password="";
    $db_name="student_records";

    $conn = mysqli_connect($server, $username, $password ,$db_name);

    if($conn){
        echo ("<h6>successfully connected.</h6>");
        return $conn;
    }
    else{
        echo ("databae not connected" . mysqli_connect_error());
    }
?>

<!-- CREATE TABLE form(
    id int(11) not null primary key auto_increment,
    name varchar(255) not null ,
    email varchar(255) not null,
    pswd varchar(255) not null,
    company varchar(255) not null 
); -->