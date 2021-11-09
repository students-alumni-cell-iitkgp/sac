<?php 
    $title="index"; 
    include 'includeAdmin/header.php'; 
    include 'config.php';
    if(isset($_GET['id'])){
        $isdeleted=delete($_GET['id']);
        if($isdeleted){ 
            echo $isdeleted;
            header('Location: view.php');}
        // else echo "there's an error is posting the edited data";
    }else{
        echo "error deleting the post";
    }
    
?>
<?php  include 'includeAdmin/footer.php'; ?>