<div class="card prof1">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Personal Information</h6>
  </div>
  <div class="card-body pt-4 p-3">
    <ul class="list-group">
      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column">
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Name     </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$name"?>     </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Email Id </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$email"?>    </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Address  </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$address"?>  </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">City     </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$city"?>     </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">State    </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$state"?>    </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Country  </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$country"?>  </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Zip Code </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$zipcode"?>  </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Mobile   </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$mobile"?>   </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">DOB      </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$dob"?>      </span></div></div>
        </div>
        <div class="ms-auto text-end">
          <button class="btn btn-link text-dark px-3 mb-0" onclick="edit_personal()"><i class="material-icons text-sm me-2">edit</i>Edit</button>
        </div>
      </li>
    </ul>
  </div>
</div>