<div class="card prof5">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">Nostalgia Section</h6>
  </div>
  <div class="card-body pt-4 p-3">
    <ul class="list-group">
      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column">
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Roll Number     </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$rollno"?>     </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Degree </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$degree"?>    </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Department  </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$dept"?>  </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Hall    </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$hall"?>     </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Year of Joining    </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$yoj"?>    </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Year of Graduating </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$yog"?>  </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Involvements </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$involvement"?>  </span></div></div>
          <div class = "row"><div class = "col-4"><span class="mb-2 text-sm">Hobbies   </span></div><div class = "col-8"><span class="text-dark text-sm font-weight-bold"><?php echo "$hobbies"?>   </span></div></div>
        </div>
        <div class="ms-auto text-end">
          <a class="btn btn-link text-dark px-3 mb-0" onclick="edit_nostalg()"><i class="material-icons text-sm me-2">edit</i>Edit</a>
        </div>
      </li>
    </ul>
  </div>
</div>