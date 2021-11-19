<?php 
    session_start();
    require_once (dirname(__FILE__)).'/../controller/functions.php';
    require_once (dirname(__FILE__)).'/../db/db_conn.php';
    
    //check if user has submitted form
    $result=null;
    $search_term=null;
    if(isset($_POST['submit'])) {
        global $search_term;
       $search_term=$_POST['search'];
       //If input is not empty
       if(!empty($search_term)){
       
        }       
    } 
    
   
    //a session to store updated id if the edit button is clicked
    if (isset($_POST['edit'])) {
        $_SESSION['edit_id'] = $_POST['edit'];
        
        //go to edit page.pgp
        header("Location: edit_form.php");
        exit();
    }
    //a session to store to be deleted id if the delete button is clicked
    if (isset($_POST['delete'])) {
        $_SESSION['delete_id'] = $_POST['delete'];
    
        //go to searchDelete.php page
        header("Location: searchDelete.php");
        exit();
    }     
       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
     <!--CSS-->
     <link rel="stylesheet" href="styles.css">
     <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    
</head>

<body>
    <main class="main">   
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="lab_A_form.php">
            Home
            </a>

            <a class="navbar-brand" href="search.php">
            Search Page
            </a>
        </div> 
           
            <div class="container form-input">
            <h1>Form 1</h1>
            <p>The search result is displayed on this same page</p>

             <!--Search form 1-->
            <form method="POST" action="" class="input-group">
                <input type="text" name="search" class="form-control">
                <button class="btn btn-primary text-white" name='submit'>Search</button>
                <div class="s-content">

                    <?php

                        global $search_term;  //access search term vairiable
                        global $result; //accee globel ressult

                        //select term from database where searh term exists
                        $result= getSingleRecordbyTerm($search_term);
                    
                        //if query is not empty
                        if($result->num_rows>0){
                        
                            //for each row in practical_lab table     
                            foreach($result as $rows){
                                ?>
                                <div class="row results-row">
                                    <div class="col-8">
                                        <!--display search term to user-->
                                        <p name="term"><?=$rows['search_term']?></p>
                                    </div>
                                    <div class="col-2">
                                        <!--Edit button-->
                                        <button name="edit" value=<?=$rows['lab_id']?> class="btn btn-primary text-white">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="col-2">
                                        <!--delete button-->
                                        <button name="delete" value=<?=$rows['lab_id']?> class="btn btn-danger text-white" >
                                            <i class="bi bi-trash"></i>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    
                                }
                            //If there is no search result
                            }else{
                                echo "<h1>OOPS! No Search Result Found</h1>";
                            }
                        ?>

                </div>

                </div>
        </form>
      
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>