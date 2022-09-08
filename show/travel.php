<div class="card prof2">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Travel Details</h6>
  </div>
  <div class="card-body pt-4 p-3">
    <ul class="list-group">
      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column">
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
        <div class="ms-auto text-end">
          <a class="btn btn-link text-dark px-3 mb-0" onclick="edit_travel()"><i class="material-icons text-sm me-2">edit</i>Edit</a>
        </div>
      </li>
    </ul>
  </div>
</div>