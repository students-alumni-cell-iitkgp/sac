<?php
error_reporting(0);

$name = $row['name'];
$url = $row['url'];

?>
<div class="row">
  <div class="col s12 m7">
    <div class="card ">
      <div class="card-image" >
        <?php 
        if(!empty($url) && file_exists($url))
        {
          echo '<img src="'.$url.'">';
        }
        else
        {
          echo '<img src="upload/addprofilepic.png">';
        }
        ?>
      </div>

    </div>
    <?php 
    if(empty($row['url']))
    {
      echo '<a class="btn-floating halfway-fab waves-effect waves-light red btn modal-trigger right" href="#modal_pic"><i class="material-icons">add</i></a>';
    }
    else
    {

      echo '<a class="btn-floating halfway-fab waves-effect waves-light red btn modal-trigger right" href="#modal_pic"><i class="material-icons">edit</i></a>';
    }

    ?>

  </div>
</div>
<!-- Modal Structure -->
<div id="modal_pic" class="modal">
  <div class="modal-content">
    <form action="profile_pic_action.php" enctype="multipart/form-data" method="post">
      <div class="file-field input-field">
        <div class="btn">
          <span>Browse your image</span>
          <input type="file" name="filetoupload" id="fileToUpload">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" required="required">
        </div>
      </div>
      <center>
        <button type="submit"  name="submit" class="btn btn-success btn-lg btn-block" style="width:25%">Upload</button>
      </center>
    </form>
  </div>

</div>
<script type="text/javascript">
 $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
