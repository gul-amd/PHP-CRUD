<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>Lista Completa</h2>
    <button class="btn btn-primary">Cadastrar Cliente</button>
</div>

    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Enderco</th>
                <th>Email</th>
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
                                <th><?php echo $row['id']; ?></th>
                                <th><?php echo $row['empresa']; ?></th>
                                <th><?php echo $row['endereco']; ?></th>
                                <th><?php echo $row['email']; ?></th>
                            </tr>
                        <?php
                    }
                }

            ?>

        </tbody>
    </table>

<?php include('footer.php'); ?>