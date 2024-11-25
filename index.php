<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>Lista Completa</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">Adicionar Cliente</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Endereço </th>
            <th>Email</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            $query = "select * from `clientes`";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query Failed".mysqli_error());
            }
            else{

                while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['empresa']; ?></td>
                            <td><?php echo $row['endereco']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Editar</a></td>
                            <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Remover</a></td>

                        </tr>
                    <?php
                }
            }

        ?>

    </tbody>
</table>

<?php

    if(isset($_GET['message'])){
        echo "<h6>".$_GET['message']."</h6>";
    }

?>

<?php

    if(isset($_GET['insert_msg'])){
        echo "<h6>".$_GET['insert_msg']."</h6>";
    }

?>

<?php

    if(isset($_GET['update_msg'])){
        echo "<h6>".$_GET['update_msg']."</h6>";
    }

?>

<?php

    if(isset($_GET['delete_msg'])){
        echo "<h6>".$_GET['delete_msg']."</h6>";
    }

?>

<form action="insert_data.php" method="post">
<div class="modal fade" 
id="Modal" 
tabindex="-1" 
aria-labelledby="exampleModalLabel" 
aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Cliente</h1>
        <button type="button" 
        class="btn-close" 
        data-bs-dismiss="modal" 
        aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="n_empresa" >Nome da Empresa</label>
                <input type="text" name="n_empresa" class="form-control">
            </div>
            <div class="form-group">
                <label for="n_endereco" >Endereço</label>
                <input type="text" name="n_endereco" class="form-control">
            </div>
            <div class="form-group">
                <label for="n_email" >Email</label>
                <input type="text" name="n_email" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" name="adicionar_empresa" value="Adicionar">
      </div>
    </div>
  </div>
</div>
</form>

<?php include('footer.php'); ?>