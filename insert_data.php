<?php

include 'dbcon.php';

if(isset($_POST['adicionar_empresa'])){
    $n_empresa = $_POST['n_empresa'];
    $n_endereco = $_POST['n_endereco'];
    $n_email = $_POST['n_email'];

    if($n_empresa == "" || empty($n_empresa)){
        header('location:index.php?message=Insira o nome valido da Empresa!');
    }

    else{
        $query = "insert into `clientes` (`empresa`, `endereco`, `email`) 
        values ('$n_empresa', '$n_endereco', '$n_email')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Falha na insercao".mysqli_error());
        }

        else{
            header('location:index.php?insert_msg=Empresa adicionada com sucesso!');
        }
    }

}

?>