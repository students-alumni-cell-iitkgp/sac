<?php 
    $title="index"; 
    include 'includeAdmin/header.php'; 
    $path="../connection.php"; 
    include 'config.php';
    
    if(isset($_GET['email'])){
        $type=$_GET['type'];
        if($type=="pay"){
    
            $isChanged=change_boolean_pay($_GET['email'],$_GET['boolean']);
            if($isChanged){ 
                header('Location: view.php');
            // else echo "there's an error is posting the edited data";
            }
          
           
        }
        else if($type=="show"){
            $isChanged=change_boolean($_GET['email'],$_GET['boolean']);
            if($isChanged){ 
                header('Location: view.php');
            // else echo "there's an error is posting the edited data";
            }
        }
        
    else{
        print_r("error updating boolean") ;
    }}
    

    
?>

<?php  include 'includeAdmin/footer.php'; ?>