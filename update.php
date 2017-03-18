<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <?php
      require 'database.php';

      $id = null;
      if ( !empty($_GET['id'])) {
          $id = $_REQUEST['id'];
      }

      if ( null==$id ) {
          header("Location: index.php");
      }

      if ( !empty($_POST)) {
          // keep track validation errors
          $codigoError = null;
          $tipoError = null;
          $quantidadeError = null;
          $precoError = null;
          $negocioError = null;

          // keep track post values
          $codigo = $_POST['codigo'];
          $tipo = $_POST['tipo'];
          $quantidade = $_POST['quantidade'];
          $preco = $_POST['preco'];
          $negocio = $_POST['negocio'];

          // validate input
          $valid = true;
          if (empty($codigo)) {
              $codigoError = 'Por favor digite um codigo de mercadoria';
              $valid = false;
          }

          if (empty($tipo)) {
              $tipoError = 'Por favor informe o tipo de mercadoria';
              $valid = false;
          }

          if (empty($quantidade)) {
              $quantidadeError = 'Por favor informe a quantidade';
              $valid = false;
          }

          if (empty($preco)) {
              $precoError = 'Por favor informe o preco';
              $valid = false;
          }

          if (empty($negocio)) {
              $negocioError = 'Por favor informe o tipo de negocio';
              $valid = false;
          }

          // update data
          if ($valid) {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "UPDATE tb_negociacao  set codigo = ?, tipo = ?, quantidade =?, preco =?, negocio =? WHERE id = ?";
              $q = $pdo->prepare($sql);
              $q->execute(array($codigo,$tipo,$quantidade,$preco,$negocio,$id));
              Database::disconnect();
              header("Location: index.php");
          }
      } else {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT * FROM tb_negociacao where id = ?";
          $q = $pdo->prepare($sql);
          $q->execute(array($id));
          $data = $q->fetch(PDO::FETCH_ASSOC);
          $codigo = $data['codigo'];
          $tipo = $data['tipo'];
          $quantidade = $data['quantidade'];
          $preco = $data['preco'];
          $negocio = $data['negocio'];
          Database::disconnect();
      }
  ?>



    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">BusinesMarket   <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#">Contato</a></li>
        <li><a href="#">Sobre</a></li>

      </ul>
    </div>
  </nav>
  <br/><br/><br/><br/>

    <div class="container">

                <div class="span10 offset1">
                    <div class="row">

                    </div>
                <!-- Formulario -->
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
  <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($codigoError)?'error':'';?>">
                        <label class="control-label">Codigo da mercadoria</label>
                        <div class="controls">
                            <input id="codigo" class="form-control" name="codigo" type="text"  placeholder="codigo" value="<?php echo !empty($codigo)?$codigo:'';?>">
                            <?php if (!empty($codigoError)): ?>
                                <span class="help-inline"><?php echo $codigoError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
</div>

  <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($tipoError)?'error':'';?>">
                        <label class="control-label">Tipo de mercadoria</label>
                        <div class="controls">
                            <input id="negocio" class="form-control" name="tipo" type="text" placeholder="tipo" value="<?php echo !empty($tipo)?$tipo:'';?>">
                            <?php if (!empty($tipoError)): ?>
                                <span class="help-inline"><?php echo $tipoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
</div>

  <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($quantidadeError)?'error':'';?>">
                        <label class="control-label">Quantidade</label>
                        <div class="controls">
                            <input id="quantidade" class="form-control" name="quantidade" type="text"  placeholder="quantidade" value="<?php echo !empty($quantidade)?$quantidade:'';?>">
                            <?php if (!empty($quantidadeError)): ?>
                                <span class="help-inline"><?php echo $quantidadeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
  </div>

  <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($precoError)?'error':'';?>">
                        <label class="control-label">Preco</label>
                        <div class="controls">
                            <input id="preco" class="form-control" name="preco" type="text"  placeholder="preco" value="<?php echo !empty($preco)?$preco:'';?>">
                            <?php if (!empty($precoError)): ?>
                                <span class="help-inline"><?php echo $precoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
  </div>

  <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($negocioError)?'error':'';?>">
                        <label class="control-label">Tipo de negocio </label>
                        <div class="controls">
                            <input id="negocio" class="form-control" name="negocio" type="text"  placeholder="negocio" value="<?php echo !empty($negocio)?$negocio:'';?>">
                            <?php if (!empty($negocioError)): ?>
                                <span class="help-inline"><?php echo $negocioError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                 <hr />
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn btn-default" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
</div>
    </div> <!-- /container -->

    <script>
               function verificaNumero(e) {
                   if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                       return false;
                   }
               }

               $(document).ready(function() {
                   $("#codigo").keypress(verificaNumero);
                   $("#preco").keypress(verificaNumero);
                   $("#quantidade ").keypress(verificaNumero);
               });
           </script>


    <!--rodape-->
    <div class="footer">

        <div class="span4 col-md-4">

              <h3><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span></h3>
              <p>Ajudando sempre você a poupar e ganhar dinheiro.</p>

            </div>

            <div class="span4 col-md-4">

                  <h3><span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span></h3>
                  <p>Ecologicamente correto sempre.</p>

                </div>

                <div class="span4 col-md-4">

                      <h3><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></h3>
                      <p>Uma ferramenta altamente global.</p>

                    </div>

                    <div class="span4 col-md-12">


                          <p>Copy right<span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span></p>

                        </div>
    	</div>
  </body>
</html>
