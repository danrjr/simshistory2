<?php
require "../vendor/autoload.php";
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

use app\dao\CategoriaSecundariaDAO;
$categoria = new CategoriaSecundariaDAO;
$result = $categoria->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tiny.cloud/1/300v3u2hvzk9ul6auimxce3emimm8qllcejdrdufy8vqv98e/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
        const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '../upload.php');
        
        xhr.upload.onprogress = (e) => {
            progress(e.loaded / e.total * 100);
        };
        
        xhr.onload = () => {
            if (xhr.status === 403) {
                reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                return;
            }
        
            if (xhr.status < 200 || xhr.status >= 300) {
                reject('HTTP Error: ' + xhr.status);
                return;
            }
        
            const json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                reject('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            resolve(json.location);
        };
        
        xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
        };
        
        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        
        xhr.send(formData);
});
      </script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'image',
      toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image',
      images_upload_url: '../upload.php', 
      images_upload_handler: image_upload_handler_callback,
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      entity_encoding: 'raw',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <p>
            <label>Titulo</label>
            <input type="text" name="titulo" id="">
        </p>
        <p>
            <label>Foto</label>
            <input type="file" name="foto" id="">
        </p>
        <p>
            <label>Corpo</label>
            <textarea name="corpo" id=""></textarea>
        </p>
        <p>
            <label>Categoria</label>
            <select name="categoria_id" id="">
                <?php foreach($result as $r):?>
                    <option value="<?php echo $r['id']?>"><?php echo $r['titulo']?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <input type="submit" value="Criar">
    </form>
</body>
</html>

<?php

use app\dao\HistoriaDAO;
use app\models\Historia;

if(isset($_POST['titulo'])){

    $historia = new Historia;
    $historiaDAO = new HistoriaDAO;
    $id = addslashes($_GET['id']);
    $titulo = FILTER_INPUT(INPUT_POST, "titulo", FILTER_DEFAULT);
    $categoria_id = FILTER_INPUT(INPUT_POST, "categoria_id", FILTER_DEFAULT);

    $historia->setTitulo($titulo);
    $historia->setCorpo($_POST['corpo']);
    $historia->setCategoria_id($categoria_id);
}

if ($_FILES['foto']['type'] == 'image/jpeg') {
    $nome_arquivo = bin2hex($_FILES['foto']['name']).rand(1,999). ".jpg";
    if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
        move_uploaded_file($_FILES['foto']['tmp_name'], '../imagens/' . $nome_arquivo);
        echo "Imagem enviada com sucesso";
        $historia->setFoto($nome_arquivo);
        $historiaDAO->update($historia, $id);
    }
}
else if ($_FILES['foto']['type'] == 'image/png') {
$nome_arquivo = bin2hex($_FILES['foto']['name']).rand(1,999) . ".png";
if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
   move_uploaded_file($_FILES['foto']['tmp_name'], '../imagens/' . $nome_arquivo);
    echo "Imagem enviada com sucesso";
    $historia->setFoto($nome_arquivo);
    $historiaDAO->update($historia, $id);
}
}
else{
echo "Imagens precisam ser em formato PNG ou JPG";

}

?>
