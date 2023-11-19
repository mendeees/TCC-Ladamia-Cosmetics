<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="color:#f10680">Ladamia Cosmetics</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="destaque.php">Destaques</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="categorias-dropdown">
                        
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search" name="frmpesquisa" method="GET" action="busca.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar" name="txtbuscar" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-default" style="background-color:#f10680;color:white">Pesquisar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart "></span> Carrinho</a></li>
                <li><a href="https://api.whatsapp.com/send?phone=5517991456065" target="_blank">Contato</a></li>

                <?php if (empty($_SESSION['id'])) { ?>

                    <li><a href="formlogon.php"><span class="glyphicon glyphicon-log-in"> Login</a></li>
                <?php } else {

                    if ($_SESSION['adm'] == 0) {

                        $consulta_user = $conn->query("select nome from usuarios where id = {$_SESSION['id']}");
                        $exibe_user = $consulta_user->fetch(PDO::FETCH_ASSOC);

                ?>

                        <li><a href="areaUser.php"><span class="glyphicon glyphicon-user" style="color:#f10680;"> <?php echo $exibe_user['nome']; ?></a></li>
                        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</a></li>

                    <?php } else { ?>

                        <li><a href="adm.php"><button class="btn btn-sm" style="background-color:#f10680;color:white">Administrador</button></a></li>
                        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</a></li>

                <?php }
                }; ?>

            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        function carregarCategorias() {
            $.ajax({
                url: 'categorias.php',
                type: 'GET',
                success: function(data) {
                    $('#categorias-dropdown').html(data);
                }
            });
        }

        carregarCategorias();

        setInterval(carregarCategorias, 60000);
    });
</script>
