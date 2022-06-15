<div class="section1">
    <div class="form-group">
        <label for="username">Name<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="name" id="name" required />
    </div>
    <div class="form-group">
        <label for="email">Email ID<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="email" id="email" onBlur="checkemailAvailability()" required />
        <span id="user-email-availability-status" style="font-size:15px;"></span>
    </div>
    <div class="form-group">
        <label for="password">Address</label>
        <input class="form-control" type="text" name="address" id="address" required />
    </div>
    <div class="form-group">
        <label for="passwordRepeat">City<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="city" id="personal_city" required />
    </div>
    <div class="form-group">
        <label for="passwordRepeat">State</label>
        <input class="form-control" type="text" name="state" id="personal_state" />
    </div>
    <div class="form-group">
        <label for="passwordRepeat">Country <span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="country" id="country" required />
    </div>
    <div class="form-group">
        <label for="passwordRepeat">Zip Code</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode"/>
    </div>
    <div class="form-group">
        <label for="passwordRepeat">Mobile<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="mobile" id="mobile" required />
    </div>
    <div class="form-group">
        <label for="passwordRepeat">DOB<span style="color:red;">*</span></label>
        <input class="form-control" type="date" name="dob" id="dob" required />
    </div>
    <div class="m-t-lg">
        <ul class="list-inline">
        <li>
            <button class="btn btn--form" type = "button" id = "next" onclick="next1()">Next</button>
        </li>
        </ul>
    </div>
</div>