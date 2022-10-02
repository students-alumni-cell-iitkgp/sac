<div class="card prof3">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Accomodation</h6>
  </div>
  <div class="card-body pt-4 p-3">
    <ul>
      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column" style="width:70%">
          <div class = "row"><div class = "col-lg-6 col-sm-12 col-md-6"><span class="mb-2 text-sm">Resident of IIT Kharagpur</span></div><div class = "col-lg-6 col-sm-12 col-md-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$employee"?>     </span></div></div>
          <div class = "row"><div class = "col-lg-6 col-sm-12 col-md-6"><span class="mb-2 text-sm">Employee ID </span></div><div class = "col-lg-6 col-sm-12 col-md-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$serial"?>    </span></div></div>
          <div class = "row"><div class = "col-lg-6 col-sm-12 col-md-6"><span class="mb-2 text-sm">Accompanying Person(s)  </span></div><div class = "col-lg-6 col-sm-12 col-md-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$accompaniment"?>  </span></div></div>
          <div class = "row"><div class = "col-lg-6 col-sm-12 col-md-6"><span class="mb-2 text-sm">Guest House    </span></div><div class = "col-lg-6 col-sm-12 col-md-6"><span class="text-dark text-sm font-weight-bold"><?php echo "$gh"?>     </span></div></div>
          </div>
      </li>
    </ul>
    <div class="ms-auto">
          <a class="btn btn-link text-dark px-3 mb-0" onclick="edit_accomod()"><i class="material-icons text-sm me-2">edit</i>Edit</a>
        </div>
  </div>
</div>