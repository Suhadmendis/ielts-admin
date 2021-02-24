<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">New User</h3>
        </div>
        <form role="form" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <a onclick="newent();" class="btn btn-default">
                        <span class="fa fa-user-plus"></span> &nbsp; New
                    </a>
                    <a onclick="save_inv();" class="btn btn-success">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>
                    <!-- <a onclick="edit();" class="btn btn-warning">
                        <span class="fa fa-edit"></span> &nbsp; Edit
                    </a>
                    <a onclick="deleteproduct();" class="btn btn-danger">
                        <span class="fa fa-trash"></span> &nbsp; Delete
                    </a> -->
                </div>
                <div id="msg_box"  class="span12 text-center"  >

                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_usernm">User Name</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="Name" id="user_name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_password">Password</label>
                    <div class="col-sm-2">
                        <input type="password" placeholder="Password" id="pass1" class="form-control">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="txt_password1">Confirm Password</label>
                    <div class="col-sm-2">
                        <input type="password" placeholder="Confirm Password" id="pass2" class="form-control">
                    </div>
                </div>
                <div class="form-group" hidden>
                    <label class="col-sm-2 control-label" for="txt_password1">User Type</label>
                    <div class="col-sm-2">
                        
                    </div>
                </div>	
                <div class="form-group" hidden>
                    <label class="col-sm-2 control-label" for="txt_password1">User Credit Department</label>
                    <div class="col-sm-2">
                        <?php

                        ?>
                    </div>
                </div>	

                <div class="form-group" hidden>
                    <label class="col-sm-2 control-label" for="txt_password">User Mail</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="User Mail" id="umail" class="form-control">

                    </div>
                </div>
                <div class="form-group" hidden>
                    <label class="col-sm-2 control-label" for="txt_password">Department Head Mail</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="Department Head Mail" id="rmail" class="form-control">

                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div id="itemdetails"></div>
            </div>
        </form>
    </div>

</section>
<script src="js/create_user.js"></script>
<script>newent();</script>
