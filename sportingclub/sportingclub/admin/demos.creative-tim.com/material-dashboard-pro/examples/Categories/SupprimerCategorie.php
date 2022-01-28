<?php  if(isset($_POST['code'])){
        $idcom = new mysqli("localhost","root","","Sportingclub");
        $stmt = $idcom->prepare("DELETE FROM category WHERE id=?");
        $stmt->bind_param("i", $_POST['code']);
        $stmt->execute();
        $idcom->close() ;
         }
        header('Location: ConsulterCategorie.php'); ?>
