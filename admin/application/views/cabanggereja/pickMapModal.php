
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="pickMapModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Titik Lokasi Usulan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div id="map"></div>
            </div>
            <div class="col-12">
              <hr>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-md-6 text-primary text-sm">
                  <div class="form-group row">
                    <label for="" class="col-12">Lat: <span id="spanLat">-</span></label>
                    <label for="" class="col-12">Lng: <span id="spanLong">-</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary float-end ms-1" id="btnAmbilTitik">Ambil Titik</button>
                  <button type="button" class="btn btn-secondary float-end"  data-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>




<script>
  
  $("#pickMapModal").on('shown.bs.modal', function () {

        lpickAlrady = false;
        map.remove();
        map = L.map('map').setView(centerMap, 8);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

        //default marker
        var textLatitude = $('#latitude').val();
        var textLongitude = $('#longitude').val();
        if (textLatitude!="" && textLongitude!="" && textLatitude!="-" && textLongitude!="-") {
          $('#spanLat').html(textLatitude);
          $('#spanLong').html(textLongitude);
          marker = L.marker([textLatitude, textLongitude]).addTo(map);
          lpickAlrady = true;
        }

    console.log(lpickAlrady);

        // lokasi = [0.461323, 127.843268];
        // var marker = L.marker(lokasi, {draggable: true}).addTo(map);
        // marker.bindPopup("Drag icon ini untuk menentukan lokasi");

        map.on('click', function(ev) {
            // console.log(ev.latlng);
            
            var lat = ev.latlng.lat;
            var lng = ev.latlng.lng;
            lokasi = [lat, lng];

            if (lpickAlrady) {
              marker.setLatLng(lokasi);
            }else{
              marker = L.marker(lokasi).addTo(map);
            }

            $('#spanLat').html(lat);
            $('#spanLong').html(lng);
            lpickAlrady = true;
        });
   });

  
  $('#btnAmbilTitik').click(function(e) {
    e.preventDefault();
    var lat = $('#spanLat').html();
    var lng = $('#spanLong').html();
    $('#latitude').val(lat).trigger('change');
    $('#longitude').val(lng).trigger('change');
    $('#longitude').change();
    
    $('#pickMapModal').modal('hide');
  });

</script>