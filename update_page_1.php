<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

    <?php
    
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $query = "select * from `clientes` where `id` = '$id'";

            $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query Failed".mysqli_error());
                }
                else{

                    $row = mysqli_fetch_assoc($result);
                }
        }

    ?>

        <?php
        
            if(isset($_POST['editar_empresa'])){

                if(isset($_GET['id_new'])){
                    $idnew = $_GET['id_new'];
                }

                $n_empresa = $_POST['n_empresa'];
                $n_endereco = $_POST['n_endereco'];
                $n_email = $_POST['n_email'];

                $query = "update `clientes` set `empresa` = '$n_empresa', `endereco` = '$n_endereco', `email` = '$n_email' where `id` = '$idnew'";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("Falha na consulta".mysqli_error());
                }

                else{
                    header('location:index.php?update_msg=');
                }

            }

        ?>


    <form action="update_page_1.php?id_new=<?php echo $id?>" method="post">
        <div class="form-group">
            <label for="n_empresa" >Nome da Empresa</label>
            <input type="text" name="n_empresa" class="form-control" value="<?php echo $row['empresa']?>">
        </div>
        <div class="form-group">
            <label for="n_endereco" >Endereço</label>
            <input type="text" name="n_endereco" class="form-control" value="<?php echo $row['endereco']?>">
        </div>
        <div class="form-group">
            <label for="n_email" >Email</label>
            <input type="text" name="n_email" class="form-control" value="<?php echo $row['email']?>">
        </div>
            <input type="submit" class="btn btn-success" name="editar_empresa" value="UPDATE">
            <a href="index.php" class="btn btn-danger">Voltar</a>
    </form>


<?php include('footer.php'); ?>