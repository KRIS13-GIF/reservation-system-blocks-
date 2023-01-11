<?php 

include 'config.php';

$id="";
$operation="";

$errorMessage="";
$successMessage="";



if( $_SERVER['REQUEST_METHOD']=='GET'){
    
    if(!isset($_GET["id"])){
        header("location: /index.php");
        exit;
    }
   // vazhdo ketu
   $id=$_GET["id"];

   $sql="SELECT * FROM ticket  WHERE id=$id";
   $result=$connection->query($sql);
   $row=$result->fetch_assoc();

   if(!$row){
    header("location: /index.php");
    exit;
   }
   $operation=$row["operation"];
}
else{
    //Post method to update

    $id=$_POST["id"];
    $operation=$_POST["operation"];
    
    // using loop is any loop is empty
do {
    if( empty($operation)){
        // if any field is empty, display the error
        $errorMessage="The field is required";
        break;
    }

    $sql="UPDATE ticket ".
    "SET operation='$operation'".
    "WHERE id=$id";

    $result=$connection->query($sql);

    if(!$result){
        $errorMessage="Invalid query: ".$connection->error;
        break;
    }

    $successMessage="Status updated successfully";
    header("location: /index.php");
    exit;

}
    while(false);


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Ticket System Update </title>
</head>
<body>
  <div class="container my-5">
   
    <?php
    
    if(!empty($errorMessage)){
        echo"
        <div class='alert alert-warning alert-dismissible fase show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
    ?>
    <form  method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Operation</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="operation" value="<?php echo $operation;?>">
            </div>
        </div>
        


        <?php
        
        if(!empty($successMessage)){
            echo"
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label
            </div>
            </div>
            </div>
            ";
        }
        ?>


        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="./index.php" role="button">Back</a>
            </div>
        </div>



    </form>
  </div>
</body>
</html>