<?php 

    session_start();
    require_once (dirname(__FILE__)).'/../db/db_conn.php';
    require_once (dirname(__FILE__)).'/../controller/functions.php';

    //check if user has submitted form
    if(isset($_POST['submit'])) {
       $search_term=$_POST['search'];
       //If input is not empty
       if(!empty($search_term)){
            //insert search term into database (practical_lab_table)
            $sql="insert into practical_lab_table(search_term) values('$search_term')";
                
            //check if insertion is successful
            if($conn->query($sql)==false){
                echo "ERROR".$sql. "<br>". $conn->Error;
            }else{
                echo "<br"."Insertion success";
            }
        }       
    } 
    //select search terms from practical_lab_table and display to user
    $sql="select * from practical_lab_table";

    $results=$conn->query($sql);       

    if (isset($_POST['edit'])) {
        $_SESSION['edit_id'] = $_POST['edit'];
        

        header("Location: edit_form.php");
        exit();
    }

    if (isset($_POST['delete'])) {
        $_SESSION['delete_id'] = $_POST['delete'];
    
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
     <!--CSS-->
     <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

   
    <title>Search Form</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="lab_A_form.php">
            Home
            </a>

            <a class="navbar-brand" href="search.php">
            Search Page
            </a>
        </div>
  
</nav>
    <main class="main">    
            <!--Search form 1-->
            <div class="container form-input">
            
            <h1>Form 1</h1>
            <p>The search result is displayed on this same page</p>
            <form method="POST" action="" class="input-group">
            <input type="text" name="search" class="form-control">
            <button class="btn btn-primary text-white" name='submit'>Submit</button>
            </div>

            <div class="s-content">

                <?php 
                    //if query is not empty
                    if($results->num_rows>0){
                        //for each row in practical_lab table     
                        foreach($results as $rows){
                            ?>
                            <div class="row results-row">
                                <div class="col-8">
                                    <p name="term"><?=$rows['search_term']?></p>
                                </div>
                                <div class="col-2">
                                    <!-- <a href="edit_form.php?lab_id=<?php echo $rows['lab_id']?>"><button class="btn btn-primary text-white"><i
                                        class="bi bi-pencil-square"></i>Edit</button></a> -->
                                    <button name="edit" value=<?=$rows['lab_id']?> class="btn btn-primary text-white">
                                        Edit
                                    </button>
                                </div>
                                <div class="col-2">
                                    <button name="delete" value=<?=$rows['lab_id']?> class="btn btn-danger text-white" >
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                            <?php
                                
                            }
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