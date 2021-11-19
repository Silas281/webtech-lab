
<?php
session_start();
require_once (dirname(__FILE__)).'/../db/db_conn.php';
require_once (dirname(__FILE__)).'/../controller/functions.php';

        //a function to delect a row from database
        $lab_id=$_SESSION['delete_id'];
        $sql = "DELETE FROM `practical_lab_table` WHERE `lab_id`='$lab_id'";
            $result=$conn->query($sql);
            //if query is successful
            if($result) { 

                //echo "<scrip>". "alert('Record Successfully Deleted!');"." </script>";
                header("location: lab_A_form.php");
        
            } else {
                // if it fails throw an error 
                echo 'Record could not be deleted!';
                //header("location: lab_A_form.php");
            }
        //}
    ?>

    
