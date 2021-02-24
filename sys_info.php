
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
              <a class="btn btn-primary" onclick="window.open('search_m_category.php?IDF=Master', 'mywin', 'width=800, height=700');" class="btn btn-info btn-sm">Search</a>
<!--              <a class="btn btn-danger" onclick="">Cancel</a>-->
              
              
              
            </div>



                
            <!-- form start -->
            <form role="form">
              <div class="box-body col-md-12">


         
                
                
                
                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Name</label>
                  </div>
                  <div class="col-sm-2">
                  <input type="text" class="form-control" id="COM_NAME" v-model="OBJ.COM_NAME" placeholder="Name">
                  </div>
                </div><br><br>
                
                
                
                
                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Email</label>
                  </div>
                  <div class="col-sm-3">
                  <input type="text" class="form-control" id="COM_EMAIL" v-model="OBJ.COM_EMAIL" placeholder="Email">
                  </div>
                </div><br><br>
                
                
                
                
                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Address 1</label>
                  </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" id="COM_ADD1" v-model="OBJ.COM_ADD1" placeholder="Address 1">
                  </div>
                </div><br><br>
                
                
                
                
                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Address 2</label>
                  </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" id="COM_ADD2" v-model="OBJ.COM_ADD2" placeholder="Address 2">
                  </div>
                </div><br><br>
                
                
                
                
                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Contact 1</label>
                  </div>
                  <div class="col-sm-3">
                  <input type="text" class="form-control" id="COM_TEL1" v-model="OBJ.COM_TEL1" placeholder="Contact 1">
                  </div>
                </div><br><br>
                
                
                
                
                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Contact 2</label>
                  </div>
                  <div class="col-sm-3">
                  <input type="text" class="form-control" id="COM_TEL2" v-model="OBJ.COM_TEL2" placeholder="Contact 2">
                  </div>
                </div><br><br>
                
                
                
                
                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >FAX</label>
                  </div>
                  <div class="col-sm-3">
                  <input type="text" class="form-control" id="COM_FAX" v-model="OBJ.COM_FAX" placeholder="FAX">
                  </div>
                </div><br><br>


                <div class="form-group"></div>
                <div class="form-group" >
                <div class="col-sm-2">
                  <label for="exampleInputEmail1" >Tax (Rs.)</label>
                  </div>
                  <div class="col-sm-3">
                  <input type="text" class="form-control" id="COM_TAX" v-model="OBJ.COM_TAX" placeholder="Tax">
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
<script src="js/sys_info.js"></script>
<!-- <script>getdt();</script> -->



