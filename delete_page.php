<?php include('dbcon.php'); ?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    $query = "delete from `clientes` where `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Falha ao remover".mysqli_error());
    }

    else{
        header('location:index.php?delete_msg=');
    }

}

?>

