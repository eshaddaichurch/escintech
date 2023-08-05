<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalkelengkapan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-title" id="modalkelengkapanJudul"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <table class="table">
                  <tbody class="text-lg" id="tbodyModalKelengkapan">
                    
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer" id="divFooter" style="display: none;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>

  </div>
</div>


<script>
  function loadDataKelengkapan(varJenisKelengkapan) {

    $('#tbodyModalKelengkapan').empty();


    //------------------------------------------------------------- TAMBAH PELAYANAN
    if (varJenisKelengkapan=='Pelayanan') {

      $.ajax({
        url: '<?php echo site_url('penjadwalan/getPelayanan') ?>',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(getPelayananResult) {
        // console.log(getPelayananResult);
        var addText = '';
        if (getPelayananResult.length>0) {
          for (var i = 0; i < getPelayananResult.length; i++) {


            if ($('#tablePelayanan tbody tr').length > 0) {


              var lSudahAda = false;
              var noEq= 0;
              $('#tablePelayanan tbody tr').each(function(){
                var pid = $(this).find("td:eq(2) input[type='hidden']").val();
                if (pid==getPelayananResult[i]['idpelayanan']) {
                    lSudahAda = true;
                }
              });

              if (!lSudahAda) {
                addText += `<tr>
                              <td>`+getPelayananResult[i]['namapelayanan']+`</td>
                              <td><button class="btn btn-success float-right btnmodal-addpelayanan" data-idpelayanan="`+getPelayananResult[i]['idpelayanan']+`" data-namapelayanan="`+getPelayananResult[i]['namapelayanan']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;                
              }

            }else{

              addText += `<tr>
                              <td>`+getPelayananResult[i]['namapelayanan']+`</td>
                              <td><button class="btn btn-success float-right btnmodal-addpelayanan" data-idpelayanan="`+getPelayananResult[i]['idpelayanan']+`" data-namapelayanan="`+getPelayananResult[i]['namapelayanan']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;

            }



          }
          $('#tbodyModalKelengkapan').append(addText);
        }
      })
      .fail(function() {
        console.log("error getPelayanan");
      });
      
      $('#modalkelengkapanJudul').html('Pilih Pelayanan Yang Diperlukan');  
    }



    //------------------------------------------------------------- TAMBAH RUANGAN
    if (varJenisKelengkapan=='Ruangan') {

      $.ajax({
        url: '<?php echo site_url('penjadwalan/getRuangan') ?>',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(getRuanganResult) {
        // console.log(getRuanganResult);
        var addText = '';
        if (getRuanganResult.length>0) {
          for (var i = 0; i < getRuanganResult.length; i++) {


            if ($('#tableRuangan tbody tr').length > 0) {

              var lSudahAda = false;
              var noEq= 0;
              $('#tableRuangan tbody tr').each(function(){
                var pid = $(this).find("td:eq(2) input[type='hidden']").val();
                if (pid==getRuanganResult[i]['idruangan']) {
                    lSudahAda = true;
                }
              });


              if (!lSudahAda) {
                addText += `<tr>
                              <td>`+getRuanganResult[i]['namaruangan']+`</td>
                              <td><button class="btn btn-success float-right btnmodal-addruangan" data-idruangan="`+getRuanganResult[i]['idruangan']+`" data-namaruangan="`+getRuanganResult[i]['namaruangan']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;                
              }

            }else{

              addText += `<tr>
                              <td>`+getRuanganResult[i]['namaruangan']+`</td>
                              <td><button class="btn btn-success float-right btnmodal-addruangan" data-idruangan="`+getRuanganResult[i]['idruangan']+`" data-namaruangan="`+getRuanganResult[i]['namaruangan']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;

            }



          }

          $('#tbodyModalKelengkapan').append(addText);
        }
      })
      .fail(function() {
        console.log("error getRuangan");
      });
      
      $('#modalkelengkapanJudul').html('Pilih Ruangan Yang Diperlukan');  
    }



    //------------------------------------------------------------- TAMBAH INVENTARIS
    if (varJenisKelengkapan=='Inventaris') {

      $.ajax({
        url: '<?php echo site_url('penjadwalan/getInventaris') ?>',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(getInventarisResult) {

        var addText = '';
        if (getInventarisResult.length>0) {
          for (var i = 0; i < getInventarisResult.length; i++) {


            if ($('#tableInventaris tbody tr').length > 0) {

              var lSudahAda = false;
              var noEq= 0;
              $('#tableInventaris tbody tr').each(function(){
                var pid = $(this).find("td:eq(2) input[type='hidden']").val();
                if (pid==getInventarisResult[i]['idinventaris']) {
                    lSudahAda = true;
                }
              });



              var idUrut = i+1;

              if (!lSudahAda) {
                addText += `<tr>
                              <td>`+getInventarisResult[i]['namainventaris']+`</td>
                              <td style="width: 15%;">Jumlah <input type="number" class="form-control" id="qtyInventaris`+idUrut+`" min="1" value="1"></td>
                              <td><button class="btn btn-success float-right btnmodal-addinventaris" data-idinventaris="`+getInventarisResult[i]['idinventaris']+`" data-namainventaris="`+getInventarisResult[i]['namainventaris']+`" data-idUrut="`+idUrut+`" data-satuan="`+getInventarisResult[i]['satuan']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;                
              }

            }else{

              addText += `<tr>
                              <td>`+getInventarisResult[i]['namainventaris']+`</td>
                              <td style="width: 15%;">Jumlah <input type="number" class="form-control" id="qtyInventaris1" min="1" value="1"></td>
                              <td><button class="btn btn-success float-right btnmodal-addinventaris" data-idinventaris="`+getInventarisResult[i]['idinventaris']+`" data-namainventaris="`+getInventarisResult[i]['namainventaris']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;

            }



          }

          $('#tbodyModalKelengkapan').append(addText);
        }
      })
      .fail(function() {
        console.log("error getInventaris");
      });
      
      $('#modalkelengkapanJudul').html('Pilih Inventaris Yang Diperlukan');  
    }



    //------------------------------------------------------------- TAMBAH PARKIRAN
    if (varJenisKelengkapan=='Parkiran') {

      $.ajax({
        url: '<?php echo site_url('penjadwalan/getParkiran') ?>',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(getParkiranResult) {
        // console.log(getParkiranResult);
        var addText = '';
        if (getParkiranResult.length>0) {
          for (var i = 0; i < getParkiranResult.length; i++) {


            if ($('#tableParkiran tbody tr').length > 0) {

              var lSudahAda = false;
              var noEq= 0;
              $('#tableParkiran tbody tr').each(function(){
                var pid = $(this).find("td:eq(2) input[type='hidden']").val();
                if (pid==getParkiranResult[i]['idparkiran']) {
                    lSudahAda = true;
                }
              });

              if (!lSudahAda) {
                addText += `<tr>
                              <td>`+getParkiranResult[i]['namaparkiran']+`</td>
                              <td><button class="btn btn-success float-right btnmodal-addparkiran" data-idparkiran="`+getParkiranResult[i]['idparkiran']+`" data-namaparkiran="`+getParkiranResult[i]['namaparkiran']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;                
              }

            }else{

              addText += `<tr>
                              <td>`+getParkiranResult[i]['namaparkiran']+`</td>
                              <td><button class="btn btn-success float-right btnmodal-addparkiran" data-idparkiran="`+getParkiranResult[i]['idparkiran']+`" data-namaparkiran="`+getParkiranResult[i]['namaparkiran']+`"><i class="fa fa-plus-circle"></i> Tambahkan</button></td>
                            </tr>`;

            }



          }

          $('#tbodyModalKelengkapan').append(addText);
        }
      })
      .fail(function() {
        console.log("error getParkiran");
      });
      
      $('#modalkelengkapanJudul').html('Pilih Parkiran Yang Diperlukan');  
    }






  }


  $(document).on("click", ".btnmodal-addpelayanan", function(e) {
    var idpelayanan = $(this).attr("data-idpelayanan");
    var namapelayanan = $(this).attr("data-namapelayanan");
    e.preventDefault();

    if ( $('#tablePelayanan tbody tr').length==1 && $('#textIdPelayanan1').val()==undefined ) {
      $('#tablePelayanan tbody tr').remove();
      
    }

    var nomor = $('#tablePelayanan tbody tr').length+1;

    var addText = `<tr>
                    <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removepelayanan"><i class="fa fa-trash text-danger"></i></a></td>
                    <td style="width: 5%; text-align: left;">`+nomor+`.</td>
                    <td style="width: 5%; text-align: left; display: none;">`+idpelayanan+`</td>
                    <td><input type="hidden" id="textIdPelayanan`+nomor+`" value="`+idpelayanan+`">`+namapelayanan+`</td>
                  </tr>`;
    
    $('#tablePelayanan tbody').append(addText);
    $(this).parent().parent().remove();
  });  


  $(document).on("click", ".btnmodal-addruangan", function(e) {
    var idruangan = $(this).attr("data-idruangan");
    var namaruangan = $(this).attr("data-namaruangan");
    e.preventDefault();
    if ( $('#tableRuangan tbody tr').length==1 && $('#textidruangan1').val()==undefined ) {
      $('#tableRuangan tbody tr').remove();
    }
    var nomor = $('#tableRuangan tbody tr').length+1;

    var addText = `<tr>
                    <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removeruangan"><i class="fa fa-trash text-danger"></i></a></td>
                    <td style="width: 5%; text-align: left;">`+nomor+`.</td>
                    <td style="display: none;">`+idruangan+`</td>
                    <td><input type="hidden" id="textidruangan`+nomor+`" value="`+idruangan+`">`+namaruangan+`</td>
                  </tr>`;
    
    $('#tableRuangan tbody').append(addText);
    $(this).parent().parent().remove();
  });


  $(document).on("click", ".btnmodal-addinventaris", function(e) {
    var idinventaris = $(this).attr("data-idinventaris");
    var namainventaris = $(this).attr("data-namainventaris");
    var idUrut = $(this).attr("data-idUrut");
    var satuan = $(this).attr("data-satuan");

    e.preventDefault();
    if ( $('#tableInventaris tbody tr').length==1 && $('#textidinventaris1').val()==undefined ) {
      $('#tableInventaris tbody tr').remove();
    }
    var nomor = $('#tableInventaris tbody tr').length+1;

    var qtyInventaris = $('#qtyInventaris'+idUrut).val();

    var addText = `<tr>
                    <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removeinventaris"><i class="fa fa-trash text-danger"></i></a></td>
                    <td style="width: 5%; text-align: left;">
                      <input type="hidden" id="textqtyinventaris`+nomor+`" value="`+qtyInventaris+`">
                      `+nomor+`.
                    </td>
                    <td style="display: none;">`+idinventaris+`</td>
                    <td style="display: none;">`+qtyInventaris+`</td>
                    <td>
                        <input type="hidden" id="textidinventaris`+nomor+`" value="`+idinventaris+`">
                        `+namainventaris+` (`+qtyInventaris+` `+satuan+`)
                    </td>
                  </tr>`;
    
    $('#tableInventaris tbody').append(addText);
    $(this).parent().parent().remove();
  });


  $(document).on("click", ".btnmodal-addparkiran", function(e) {
    var idparkiran = $(this).attr("data-idparkiran");
    var namaparkiran = $(this).attr("data-namaparkiran");
    e.preventDefault();
    if ( $('#tableParkiran tbody tr').length==1 && $('#textidparkiran1').val()==undefined ) {
      $('#tableParkiran tbody tr').remove();
    }
    var nomor = $('#tableParkiran tbody tr').length+1;

    var addText = `<tr>
                    <td style="width: 5%; text-align: center;"><a href="#" class="btnmodal-removeparkiran"><i class="fa fa-trash text-danger"></i></a></td>
                    <td style="width: 5%; text-align: left;">`+nomor+`.</td>
                    <td style="display: none;">`+idparkiran+`</td>
                    <td><input type="hidden" class="textidparkiran" id="textidparkiran`+nomor+`" value="`+idparkiran+`">`+namaparkiran+`</td>
                  </tr>`;
    
    $('#tableParkiran tbody').append(addText);
    $(this).parent().parent().remove();
  });

</script>