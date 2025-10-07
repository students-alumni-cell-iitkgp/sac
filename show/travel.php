<div class="card prof2">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Travel Details</h6>
  </div>
  <div class="card-body pt-4 p-3">
<<<<<<< HEAD
    <ul id="travel_list">
      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column" style="width:100%">
          <!-- Row template -->
          <?php
          $fields = [
            'travel_from' => ['label'=>"Travelling From? (Country, State)", 'type'=>'text', 'value'=>$travel_form],
            'mode' => ['label'=>"Mode of Travelling", 'type'=>'text', 'value'=>$mode],
            'reach_in' => ['label'=>"Where will you be reaching?", 'type'=>'text', 'value'=>$reach_in],
            'date_reach_in' => ['label'=>"Date of reaching the above location", 'type'=>'date', 'value'=>$date_reach_in],
            'time_reach_in' => ['label'=>"Time of reaching the above location", 'type'=>'time', 'value'=>$time_reach_in],
            'flight_no' => ['label'=>"Flight Number", 'type'=>'text', 'value'=>$flight_no],
            'train_no' => ['label'=>"Train Ticket PNR Number", 'type'=>'text', 'value'=>$train_no],
            'cab' => ['label'=>"Do you need a cab from the above chosen location?", 'type'=>'text', 'value'=>$cab],
            'cab_type' => ['label'=>"Preferred Cab type", 'type'=>'text', 'value'=>$cab_type],
            'no_acc' => ['label'=>"Number of Accompaniments", 'type'=>'number', 'value'=>$no_acc],
            'date_reach_out' => ['label'=>"Date to return", 'type'=>'date', 'value'=>$date_reach_out],
            'time_reach_out' => ['label'=>"Time at which you prefer to leave", 'type'=>'time', 'value'=>$time_reach_out],
            'reach_out' => ['label'=>"Where will you be returning to?", 'type'=>'text', 'value'=>$reach_out]
          ];

          foreach ($fields as $key => $f) {
            echo '<div class="row mb-2">';
            echo '<div class="col-6"><span class="mb-2 text-sm">'.$f['label'].'</span></div>';
            echo '<div class="col-6">';
            echo '<span class="text-dark text-sm font-weight-bold display_text" id="display_'.$key.'">'.$f['value'].'</span>';
            echo '<input class="form-control edit_input" id="input_'.$key.'" type="'.$f['type'].'" value="'.$f['value'].'" style="display:none;" placeholder="'.$f['label'].'">';
            echo '</div></div>';
          }
          ?>
        </div>
      </li>
    </ul>

    <div class="ms-auto">
      <a class="btn btn-link text-dark px-3 mb-0" id="edit_btn"><i class="material-icons text-sm me-2">edit</i>Edit</a>
      <a class="btn btn-link text-dark px-3 mb-0" id="save_btn" style="display:none;"><i class="material-icons text-sm me-2">save</i>Save</a>
    </div>
  </div>
</div>

<script>
document.getElementById('edit_btn').addEventListener('click', function() {
    // Show inputs, hide text
    document.querySelectorAll('.display_text').forEach(el => el.style.display = 'none');
    document.querySelectorAll('.edit_input').forEach(el => el.style.display = 'block');
    document.getElementById('edit_btn').style.display = 'none';
    document.getElementById('save_btn').style.display = 'inline-block';
});

document.getElementById('save_btn').addEventListener('click', function() {
    // Copy input values back to text
    document.querySelectorAll('.edit_input').forEach(input => {
        const id = input.id.replace('input_', '');
        const display = document.getElementById('display_' + id);
        display.textContent = input.value;
        display.style.display = 'block';
        input.style.display = 'none';
    });
    document.getElementById('edit_btn').style.display = 'inline-block';
    document.getElementById('save_btn').style.display = 'none';

    // Optionally: Add AJAX call here to save updated data to the server
});
</script>
=======
    <ul>
      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column" style="width:70%">
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Travelling From? (Please write Country and State)     </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$travel_form"?>     </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Mode of Travelling </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$mode"?>    </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Where will you be reaching?  </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$reach_in"?>  </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Date of reaching the above location     </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$date_reach_in"?>     </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Time of reaching the above location    </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$time_reach_in"?>    </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Flight Number  </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$flight_no"?>  </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Train Ticket PNR Number </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$train_no"?>  </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Do you need a cab from the above chosen location?   </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$cab"?>   </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Preferred Cab type      </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$cab_type"?>      </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Number of Accompaniments     </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$no_acc"?>     </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Date to return </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$date_reach_out"?>    </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Time at which you pefer to leave  </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$time_reach_out"?>  </span></div></div>
          <div class = "row"><div class = "col-6"><span class="mb-2 text-sm">Where will you be returning to?     </span></div><div class = "col-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$reach_out"?>     </span></div></div>
          
        </div>
      </li>
    </ul>
    <div class="ms-auto">
          <a class="btn btn-link text-dark px-3 mb-0" onclick="edit_travel()"><i class="material-icons text-sm me-2">edit</i>Edit</a>
        </div>
  </div>
</div>
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
