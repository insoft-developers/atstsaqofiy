<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bidang Studi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Bidang Studi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><button onclick="addData()" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
              </button></h3>
            <div class="card-tools">
              <button onclick="refreshData()" class="btn btn-primary btn-sm">
                <i class="fas fa-recycle"></i> Refresh
              </button>
            </div>
          </div>
          <div class="card-body">
              <table id="table_studi" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">ID</th>
                  <th width="*">Bidang Studi</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody></tbody>
              </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->


    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <?php echo form_open_multipart('Studi/saveData', array('id'=> 'frmStudi'));  ?>
              <input type="hidden" name="_method" id="_method" />
              <input type="hidden" id="id" name="id" />
              <div class="form-group">
                <label>Bidang Studi :</label>
                <input type="text" class="form-control" id="bidangstudi" name="bidangstudi" required>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button style="display: none;" id="btn_tambah" type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button style="display: none;" id="btn_update" type="submit" class="btn btn-warning btn-sm">Update</button>
            <?php echo form_close();?>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="modal-hapus">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_hapus">
              <p>Anda yakin ingin mengahapus data ini...?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-sm btn-outline-light" data-dismiss="modal">Close</button>
              <button onclick="deleteConfirm()" type="button" class="btn btn-sm btn-outline-light">Hapus Data</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  </div>
  <!-- /.content-wrapper -->


  <script>

  var Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 3000
  });


  function refreshData() {
     reloadTable();
  }


  $("#table_studi").DataTable({
      "processing":true,  
      "serverSide":true,
      "responsive": true,
      "order":[],
      "ajax":{
          url: "<?php echo base_url();?>index.php/Studi/fetch_datatable",
          type:"POST"
      },
      "columnDefs":[
          {
              "targets":[],
              "orderable":false,
          }
      ],
  });


  

  function addData() {
      $("#modal-edit").modal("show");
      $(".modal-title").text('Tambah Data');
      $("#btn_tambah").show();
      $("#btn_update").hide();
      resetForm();
      $("#_method").val("add");
  }



  function editData(id) {
    $("#modal-edit").modal("show");
    $(".modal-title").text('Edit Data');
    $("#btn_tambah").hide();
    $("#btn_update").show(); 
    $("#_method").val("edit");
    $("#gambar").removeAttr("required");

    $.ajax({
       url : "<?php echo base_url();?>index.php/Studi/getdatabyid/"+id,
       type : "GET",
       dataType : "JSON",
       success : function(data) {
          console.log(data);
          $("#id").val(data[0].id);
          $("#bidangstudi").val(data[0].bidang_studi);
          


       }
    })
      
  }


  $("#frmStudi").submit(function(e){
      e.preventDefault();
      $("#loadingProgress").show();
      
      var url = "";
      var metode = $("#_method").val();
      if(metode == 'add') {
         url = "<?php echo base_url();?>index.php/Studi/savedata";
      } else {
         url = "<?php echo base_url();?>index.php/Studi/updatedata";
      }

      $.ajax({
          url : url,
          dataType : "JSON",
          data : $("#frmStudi").serialize(),
          type : "POST",
          success : function(data) {
              $("#loadingProgress").hide();
              reloadTable();
              $("#modal-edit").modal('hide');
              console.log(data);
          }
      });
  });





  function deleteData(id) {
     $("#modal-hapus").modal("show");
     $("#id_hapus").val(id);
  }


  function deleteConfirm() {
     $("#loadingProgress").show();
     
     var id_hapus = $("#id_hapus").val();
     $.ajax({
        url : "<?php echo base_url();?>index.php/Studi/deletedata",
        type : "POST",
        data : {id: id_hapus},
        success : function(data) {
              $("#loadingProgress").hide();
              Toast.fire({
                  icon: 'success',
                  title: ' Sukses Hapus Data'
              });
              reloadTable();
              $("#modal-hapus").modal("hide");
        },
        error: function() {
             alert('Hapus Data Gagal..!');
             $("#loadingProgress").hide();
             $("#modal-hapus").modal("hide");
        }
     })
  }


  function resetForm() {
     $("#bidangstudi").val("");
  }


  function reloadTable() {
    $("#table_studi").DataTable().ajax.reload(null,false);
  }




</script>