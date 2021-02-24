
<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<section class="content container-fluid" id="app">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ en_name }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="btn-group" style="padding: 10px;">
                    <a class="btn btn-success" onclick="save_info();">Save</a>
                    <a class="btn btn-primary" onclick="window.open('search_m_vessel.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
                    <a class="btn btn-danger" onclick="cancel_imb()">Cancel</a>



                </div>



                <!-- form start -->
                <form role="form">
                    <div class="box-body col-md-12">



                        <div class="form-group"></div>
                        <div class="form-group" >
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1" >Reference No</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="REF" v-model="REF" placeholder="Reference No" disabled>
                            </div>
                        </div><br><br>


                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="first_name" >Company</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="company_ref" placeholder="Company REF" disabled>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="company_name" placeholder="Company Name" disabled>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-default" onclick="window.open('search_m_company.php?IDF=item', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">...</a>
                            </div>
                        </div><br><br>

                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="first_name" >Vessel Name</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="name" placeholder="Vessel Name">
                            </div>
                        </div><br><br>

                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="first_name" >Flag</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="flag" placeholder="Flag">
                            </div>
                        </div><br><br>

                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="first_name" >IMO Number</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="imo_number" placeholder="IMO Number">
                            </div>
                        </div><br><br>

                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="first_name" >Call Sign</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="call_sign" placeholder="Call Sign">
                            </div>
                        </div><br><br>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">

                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->




    </div>

</section>
<script src="js/m_vessel.js"></script>
<!-- <script>getdt();</script> -->



