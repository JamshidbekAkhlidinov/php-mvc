<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 5 2023 12:18:11
 *   https://github.com/JamshidbekAkhlidinov
 */


?>

<h2>
    Register Form
</h2>
<form action="" method="post">

    <div class="row mb-3">
        <div class="col-sm-6">
            <label class="form-label">First name</label>
            <input type="text" name="first_name" class="form-control">
        </div>
        <div class="col-sm-6">
            <label class="form-label">Last name</label>
            <input type="text" name="last_name" class="form-control">
        </div>

    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="col-sm-6">
            <label for="exampleInputPassword1" class="form-label">Password Confirm</label>
            <input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword1">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>