<html>
<head>
  <title>BusinesMarket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>


  <?php

      require 'database.php';

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
              $codigoError = 'Por favor digite o codigo da mercadoria';
              $valid = false;
          }

          if (empty($tipo)) {
              $tipoError = 'Por favor digite o tipo da mercadoria';
              $valid = false;
          }


          if (empty($quantidade)) {
              $quantidadeError = 'Por favor digite a quantidade da mercadoria';
              $valid = false;
          }

          if (empty($preco)) {
              $precoError = 'Por favor digite o preco da mercadoria';
              $valid = false;
          }

          if (empty($negocio)) {
              $negocioError = 'Por favor digite o tipo de negocio';
              $valid = false;
          }

          // insert data
          if ($valid) {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "INSERT INTO tb_negociacao (codigo,tipo,quantidade,preco,negocio) values(?, ?, ?, ?, ?)";
              $q = $pdo->prepare($sql);
              $q->execute(array($codigo,$tipo,$quantidade,$preco,$negocio));
              Database::disconnect();
              header("Location: index.php");
          }
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
<!--
<h3>Adicionar</h3>
<form action="index.php">
  <!-- area de campos do form
  <div class="row">
 <div class="form-group col-md-4">
   <label for="codigo">Codigo da mercadoria</label>
   <input type="text" class="form-control" id="codigo">
 </div>

 <div class="form-group col-md-4">
   <label for="tipo">Tipo da mercadoria</label>
   <input type="text" class="form-control" id="tipo">
 </div>

 <div class="form-group col-md-4">
   <label for="quantidade">Quantidade</label>
   <input type="text" class="form-control" id="quantidade">
 </div>

 <div class="form-group col-md-4">
   <label for="preco">Preço</label>
   <input type="text" class="form-control" id="preco">
 </div>

<div class="form-group col-md-4">
   <div class="dropdown">
     <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tipo de negócio
     <span class="caret"></span></button>
     <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
       <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Compra</a></li>
       <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Venda</a></li>
     </ul>
   </div>
</div>-->

<div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
                  <!-- Formulario -->
                    <form class="form-horizontal" action="add.php" method="post">

                      <!-- Campos formulario-->
                      <div class="row">

                      <!--Codigo da mercadoria-->
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

                      <!--Tipo da mercadoria-->
                      <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($tipoError)?'error':'';?>">
                        <label class="control-label">Tipo da mercadoria</label>
                        <div class="controls">
                            <input id="tipo" class="form-control" name="tipo" type="text" placeholder="tipo" value="<?php echo !empty($tipo)?$tipo:'';?>">
                            <?php if (!empty($tipoError)): ?>
                                <span class="help-inline"><?php echo $tipoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                    </div>

                      <!--Quantidade da mercadoria -->
                      <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($quantidadeError)?'error':'';?>">
                        <label class="control-label">Quantidade da mercadoria</label>
                        <div class="controls">
                            <input id="quantidade" class="form-control" name="quantidade" type="text"  placeholder="quantidade" value="<?php echo !empty($quantidade)?$quantidade:'';?>">
                            <?php if (!empty($quantidadeError)): ?>
                                <span class="help-inline"><?php echo $quantidadeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                    </div>

                      <!--Preco da mercadoria -->
                      <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($precoError)?'error':'';?>">
                        <label class="control-label">Preco da mercadoria</label>
                        <div class="controls">
                            <input id="preco" class="form-control" name="preco" type="text"  placeholder="preco" value="<?php echo !empty($preco)?$preco:'';?>">
                            <?php if (!empty($precoError)): ?>
                                <span class="help-inline"><?php echo $precoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                    </div>

                      <!--Negocio da mercadoria -->
                      <div class="form-group col-md-4">
                      <div class="control-group <?php echo !empty($negocioError)?'error':'';?>">
                        <label class="control-label">Tipo de negocio</label>
                        <div class="controls">
                            <input id="negocio"class="form-control" name="negocio" type="text"  placeholder="negocio" value="<?php echo !empty($negocio)?$negocio:'';?>">
                            <?php if (!empty($negocioError)): ?>
                                <span class="help-inline"><?php echo $negocioError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                    </div>




                      </div>
                      <!-- Botoes-->
                      <hr />
                      <div class="form-actions">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-primary">Salvar</button>
                          <a class="btn btn-danger" href="index.php">Cancelar</a>
                        </div>
                        </div>

                    </form>
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


</div>
<!--
  <hr />
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Continuar</button>
      <a href="index.html" class="btn btn-default">Cancelar</a>
    </div>
  </div>-->
</form>

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
