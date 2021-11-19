<?php 
session_start();
//require_once 'db_conn.php';
require_once (dirname(__FILE__)).'/../db/db_conn.php';
require_once (dirname(__FILE__)).'/../controller/functions.php';

?>

<?php

            $lab_id=$_SESSION['edit_id'];
            //$search_term=$_SESSION['edit_term'];
           //check if update is clicked
           if(isset($_POST['update'])){
            //get updated value
            $searhterm2=$_POST['search1'];
           
            //update data in Practical_lab_table
            $sql="update practical_lab_table set search_term='$searhterm2' where lab_id='$lab_id'";
            $updeted=$conn->query($sql);
            
           
            //go back to home
            header("location: lab_A_form.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Form</title>
</head>

<body>
    <main class="main">

        <div class="container form-input"
            style="display: flex; flex-direction: column; align-items:center; justify-content: center;">
            <h1>Update Search</h1>
            <!--Update form 1-->
            <form method="POST" action="edit_form.php" class="input-group input-group1">
                <input type="text" name="search1" class="form-control" value="<?php ?>">
                <button class="btn btn-primary text-white" name='update'>Update</button>
            </form>
        </div>

    </main>


</body>

</html>