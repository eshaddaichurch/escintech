<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");


?>
    
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/fullcalendar/main.css">

  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Penjadwalan</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">Penjadwalan</li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-md-12 mt-3">

      <div class="card" id="cardcontent">
        <div class="card-header">
          <h5 class="card-title">Kalender Jadwal</h5>
          <a href="<?php echo(site_url('pengajuanjadwal/tambah')) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus-circle"></i> Tambah Data</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <div id="calendar"></div>

            </div>
          </div>
        </div>
      </div>


      
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->

<?php $this->load->view("template/footer") ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalDetailEvent">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="modalJudul"></h3>
      </div>
      <div class="modal-body text-lg">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <table>
                <tbody>
                  <tr>
                    <td style="width: 15%;">Nama Departemen</td>
                    <td style="width: 5%; text-align: center;">:</td>
                    <td style="width: 30%; text-align: left;" id="namadepartementModal"></td>
                    <td style="width: 15%;">Penanggungjawab</td>
                    <td style="width: 5%; text-align: center;">:</td>
                    <td style="width: 30%; text-align: left;" id="namapenanggungjawabModal"></td>
                  </tr>
                  <tr>
                    <td style="width: 15%;">Jenis Jadwal</td>
                    <td style="width: 5%; text-align: center;">:</td>
                    <td style="width: 30%; text-align: left;" id="jenisjadwalModal"></td>
                    <td style="width: 15%;">Status Konfirmasi</td>
                    <td style="width: 5%; text-align: center;">:</td>
                    <td style="width: 30%; text-align: left;" id="statuskonfirmasiModal"></td>
                  </tr>
                  <tr>
                    <td style="width: 15%;">Tanggal Mulai Event</td>
                    <td style="width: 5%; text-align: center;">:</td>
                    <td style="width: 30%; text-align: left;" id="tanggalMulaiEventModal"></td>
                    <td style="width: 15%;">Tanggal Berakhir Event</td>
                    <td style="width: 5%; text-align: center;">:</td>
                    <td style="width: 30%; text-align: left;" id="tanggalSelesaiEventModal"></td>
                  </tr>
                  <tr>
                    <td style="width: 15%;">Deskripsi</td>
                    <td style="width: 5%; text-align: center;">:</td>
                    <td style="width: 80%; text-align: left;" colspan="4" id="deskripsiModal"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- fullCalendar 2.2.5 -->
<script src="<?php echo(base_url()) ?>assets/moment/moment.min.js"></script>
<script src="<?php echo(base_url()) ?>assets/fullcalendar/main.js"></script>

<script>




    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');


    $(document).ready(function() {
      $.ajax({
        url: '<?php echo site_url('penjadwalan/getCalenderDetail') ?>',
        dataType: 'json',
      })
      .done(function(getCalenderDetailResult) {
        console.log(getCalenderDetailResult);


        var calendar = new Calendar(calendarEl, {
          headerToolbar: {
            left  : 'prev,next today',
            center: 'title',
            right : 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          themeSystem: 'bootstrap',
          //Random default events
          events: getCalenderDetailResult,
          editable  : true,
          droppable : true, // this allows things to be dropped onto the calendar !!!
          drop      : function(info) {
            // is the "remove after drop" checkbox checked?
            // if (checkbox.checked) {
            //   // if so, remove the element from the "Draggable Events" list
            //   info.draggedEl.parentNode.removeChild(info.draggedEl);
            // }
          },
          eventClick: function(info) {
            // console.log(info.event.extendedProps);
            var idjadwalevent = info.event.extendedProps.idjadwalevent;
            $('#modalDetailEvent').modal('show');

            $.ajax({
              url: '<?php echo site_url('penjadwalan/getDetailJadwal') ?>',
              type: 'GET',
              dataType: 'json',
              data: {'idjadwalevent': idjadwalevent},
            })
            .done(function(resultDetail) {
              console.log(resultDetail);   
              $('#modalJudul').html(resultDetail['namaevent']);
              $('#namadepartementModal').html(resultDetail['namadepartement']);
              $('#namapenanggungjawabModal').html(resultDetail['namapenanggungjawab']);
              $('#jenisjadwalModal').html(resultDetail['jenisjadwal']);
              $('#deskripsiModal').html(resultDetail['deskripsi']);
              $('#statuskonfirmasiModal').html(resultDetail['statuskonfirmasi']);
              $('#tanggalMulaiEventModal').html(resultDetail['tglmulai']);
              $('#tanggalSelesaiEventModal').html(resultDetail['tglselesai']);
            })
            .fail(function() {
              console.log("error");
            });
            

            // change the border color just for fun
            // info.el.style.borderColor = 'red';
          }
        });

        calendar.render();
        // $('#calendar').fullCalendar()


      })
      .fail(function() {
        console.log("error getCalenderDetail");
      });


      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      // Color chooser button
      $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color'    : currColor
        })
      })
      $('#add-new-event').click(function (e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        // Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color'    : currColor,
          'color'           : '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
      })

      
    });


</script>

</body>
</html>

