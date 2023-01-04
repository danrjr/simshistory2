<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/simshistory2/css/styles.css"/>
    <title>Document</title>
</head>
<body>
<div class="above-header">
        <a href="http://localhost/simshistory2/index.php"><p>The Sims Historias</p></a>
</div>
    <header>
        <img src="https://www.alalasims.com/noticias/wp-content/uploads/2019/08/SIMS4_Plumbob_Primary_RGB.png" alt="">  
      <nav class="navigation">
            <ul><li><a href="http://localhost/simshistory2/categorias/filmes.php">Filmes</a></li></ul>
            <ul><li><a href="http://localhost/simshistory2/categorias/novelas.php">Novelas</a></li></ul>
            <ul><li><a href="http://localhost/simshistory2/categorias/series.php">Series</a></li></ul>
            <ul><li><a href="http://localhost/simshistory2/categorias/realities.php">Reality Shows</a></li></ul>
    </nav>
    <form action="http://localhost/simshistory2/buscar.php" method="post">
        <input type="text" name="search" id="search" placeholder="Encontrar...">
        <input type="submit" id="buscar" value="Buscar">
    </form>
</header>

<script>
    $(document).bind("keydown", function(event){
    if(event.which == "13")
   {
      $("#buscar").click();
    }
});
</script>
