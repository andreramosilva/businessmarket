<html>
<head>
  <title>BusinesMarket </title>
<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">BusinesMarket      <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="add.php">Adicionar</a></li>
      <li><a href="#">Contato</a></li>
      <li><a href="#">Sobre</a></li>

    </ul>
  </div>
</nav>
<br/><br/><br/><br/><br/>

<div class="container" id="divisao">
<div class="span9 offset1">
 <div class="form-group col-md-4">

<div id="myCarousel" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/phone.jpg" alt="phone">
    </div>

    <div class="item">
      <img src="images/calc.jpg" alt="Calc">
    </div>

    <div class="item">
      <img src="images/obra.jpg" alt="obra">
    </div>

    <div class="item">
      <img src="images/banco.jpg" alt="banco">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
</div>


<!-- TABELA -->
<div class="container">
            <div class="row">

            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Codigo mercadoria</th>
                      <th>Tipo mercadoria</th>
                      <th>Quantidade</th>
                      <th>Preco</th>
                      <th>Tipo de negocio</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM tb_negociacao ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['codigo'] . '</td>';
                            echo '<td>'. $row['tipo'] . '</td>';
                            echo '<td>'. $row['quantidade'] . '</td>';
                            echo '<td>'. $row['preco'] . '</td>';
                            echo '<td>'. $row['negocio'] . '</td>';
                            echo '<td width=250>';
                               echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                               echo ' ';
                               echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                               echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>

    </div> <!-- /container -->
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
                  <p>Atualmente uma ferramenta global.</p>

                </div>

                <div class="span4 col-md-12">


                      <p>Copy right<span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span></p>

                    </div>
	</div>
</body>
</html>
