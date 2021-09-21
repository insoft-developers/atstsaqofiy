<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Pelajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Jadwal Pelajaran</li>
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
              <div class="table table-responsive">
              <table style="font-size: 12px;" id="table_jadwal" class="table table-bordered table-striped nowrap">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Kelas</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                  <th>Sabtu</th>
                  <th>Minggu</th>
                  
                </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->


    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <?php echo form_open_multipart('Jadwal/saveData', array('id'=> 'frmJadwal'));  ?>
              <input type="hidden" name="_method" id="_method" />
              <input type="hidden" id="id" name="id" />
              
              <div class="row">
                <div class="col-md-7">
                   <div class="card" style="background-color: whitesmoke;">
                      <div class="card-body">
                          <div class="form-group">
                            <label>Hari :</label>
                            <select id="jadwalhari" name="jadwalhari" class="form-control" required>
                               <option value=""> - Pilih Hari - </option>
                               <option value="Senin">Senin</option>
                               <option value="Selasa">Selasa</option>
                               <option value="Rabu">Rabu</option>
                               <option value="Kamis">Kamis</option>
                               <option value="Jumat">Jumat</option>
                               <option value="Sabtu">Sabtu</option>
                               <option value="Minggu">Minggu</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Kelas :</label>
                            <select id="jadwalkelas" name="jadwalkelas" class="form-control" required>
                               <option value=""> - Pilih Kelas - </option>
                               <?php foreach ($kelas as $key ) { ?>
                                  <option value="<?= $key->id;?>"><?= $key->kelas;?></option>
                               <?php } ?>

                            </select>
                          </div>


                          <div class="form-group">
                            <label>Bidang Studi :</label>
                            <select id="jadwalstudi" name="jadwalstudi" class="form-control" required>
                               <option value=""> - Pilih Bidang Studi - </option>
                               <?php foreach ($studi as $key ) { ?>
                                  <option value="<?= $key->id;?>"><?= $key->bidang_studi;?></option>
                               <?php } ?>

                            </select>
                          </div>


                          <div class="form-group">
                            <label>Guru :</label>
                            <select id="jadwalguru" name="jadwalguru" class="form-control" required>
                               <option value=""> - Pilih Guru - </option>
                               <?php foreach ($guru as $key ) { ?>
                                  <option value="<?= $key->id;?>"><?= $key->guru;?></option>
                               <?php } ?>
                            </select>
                          </div>
                      </div>
                   </div>
                    
                </div>
                <div class="col-md-5">
                  <div class="card" style="background-color: whitesmoke;">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Jam Masuk :</label>
                        <input type="time" class="form-control" id="jadwalmasuk" name="jadwalmasuk" required>
                      </div>

                       <div class="form-group">
                        <label>Jam Keluar :</label>
                        <input type="time" class="form-control" id="jadwalkeluar" name="jadwalkeluar" required>
                      </div>

                    </div>
                  </div>
                  

                </div>
              </div>
              

             

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button style="display: none;" id="btn_tambah" type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button style="display: none;color:white;" id="btn_update" type="submit" class="btn btn-warning btn-sm">Update</button>
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


  $("#table_jadwal").DataTable({
      "processing":true,  
      "serverSide":true,
      "order":[],
      "ajax":{
          url: "<?php echo base_url();?>index.php/Jadwal/fetch_datatable",
          type:"POST"
      },
      "columnDefs":[
          {
              "targets":[],
              "orderable":false,
          }
      ]
      
  });


  function editjadwal(id) {
     $("#_method").val("edit");
     $.ajax({
        url : "<?php echo base_url();?>index.php/Jadwal/getjadwalbyid",
        type :"POST",
        dataType : "JSON",
        data : {id:id},
        success : function(data) {
              $(".modal-title").text('Edit Data Jadwal');
              $("#modal-edit").modal("show");
              $("#id").val(data[0].id);
              $("#jadwalhari").val(data[0].hari);
              $("#jadwalkelas").val(data[0].id_kelas);
              $("#jadwalstudi").val(data[0].id_studi);
              $("#jadwalguru").val(data[0].id_guru);
              $("#jadwalmasuk").val(data[0].jam_masuk);
              $("#jadwalkeluar").val(data[0].jam_keluar);
              $("#btn_update").show();
              $("#btn_tambah").hide();


        }
     });
  }



  function deletejadwal(id) {
      $("#modal-hapus").modal("show");
      $("#id_hapus").val(id);
  }




  

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
       url : "<?php echo base_url();?>index.php/Jadwal/getdatabyid/"+id,
       type : "GET",
       dataType : "JSON",
       success : function(data) {
          console.log(data);
          $("#id").val(data[0].id);
          $("#bidangstudi").val(data[0].bidang_studi);
          


       }
    })
      
  }


  $("#frmJadwal").submit(function(e){
      e.preventDefault();
      $("#loadingProgress").show();
      
      var url = "";
      var metode = $("#_method").val();
      if(metode == 'add') {
         url = "<?php echo base_url();?>index.php/Jadwal/savedata";
      } else {
         url = "<?php echo base_url();?>index.php/Jadwal/updatedata";
      }

      $.ajax({
          url : url,
          dataType : "JSON",
          data : $("#frmJadwal").serialize(),
          type : "POST",
          success : function(data) {
              $("#loadingProgress").hide();
              reloadTable();
              $("#modal-edit").modal('hide');
              console.log(data);
          }
      });
  });



  function deleteConfirm() {
     $("#loadingProgress").show();
     
     var id_hapus = $("#id_hapus").val();
     $.ajax({
        url : "<?php echo base_url();?>index.php/Jadwal/deletedata",
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
        }
     })
  }


  function resetForm() {
     $("#id").val("");
     $("#jadwalhari").val("");
     $("#jadwalstudi").val("");
     $("#jadwalguru").val("");
     $("#jadwalkelas").val("");
     $("#jadwalmasuk").val("");
     $("#jadwalkeluar").val("");
  }


  function reloadTable() {
    $("#table_jadwal").DataTable().ajax.reload(null,false);
  }




</script>