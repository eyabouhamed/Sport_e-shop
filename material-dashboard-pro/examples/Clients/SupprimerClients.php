 <?php  if(isset($_POST['id'])){
        $idcom = new mysqli("localhost","root","","Sportingclub");
        $stmt = $idcom->prepare("DELETE FROM client WHERE id=?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $idcom->close() ;
         }
        header('Location: ConsulterClients.php'); ?>