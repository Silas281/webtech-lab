<?php
require_once (dirname(__FILE__)).'/../db/db_conn.php';


    //get a single record by id
    function getSingleRecord($id){
        //access $conn db conn variable 
        global $conn;
        $sql="select lab_id,search_term from `practical_lab_table` where lab_id='$id'";    
        //attempt to execute the query
        $result = $conn->query($sql);
        if(!$result){
            echo "ERROR".$sql. "<br>". $conn->Error;
        }else{
            //return the result
            return $result; 
        }
        
    }

        //get a single record by search_term
        function getSingleRecordbyTerm($search_term){
            //access $conn db conn variable 
            global $conn;
            $sql="select lab_id,search_term from `practical_lab_table` where search_term='$search_term'";    
            //attempt to execute the query
            $result = $conn->query($sql);
            
            //return the result
            return $result; 
        
        }

    

        



?>