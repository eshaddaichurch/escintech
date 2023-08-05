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
    <div class="col-12">
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fa fa-plus"></i> Tambah Jadwal
      </button>
    </div>
    <div class="col-md-12 mt-3">

       <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <!-- /.col -->
            <div class="col-md-9">
              <div class="card card-primary">
                <div class="card-body p-0">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

      
    </div> <!-- /.col -->
  </div> <!-- /.row -->
  <!-- Main row -->

<?php $this->load->view("template/footer") ?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">

            <div class="col-12">
              <a href="<?php echo site_url('penjadwalan/tambahjadwalibadah') ?>">
                <div class="card">
                  <div class="card-body text-center bg-escbg">
                    <h5>Jadwal Ibadah</h5>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-12">
              <a href="<?php echo site_url('penjadwalan/tambahjadwalevent') ?>">
                <div class="card">
                  <div class="card-body text-center bg-escbg">
                    <h5>Jadwal Event</h5>
                  </div>
                </div>
              </a>
            </div>

            
            <div class="col-12">
              <a href="<?php echo site_url('penjadwalan/tambahjadwalkelas') ?>">
                <div class="card">
                  <div class="card-body text-center bg-escbg">
                    <h5>Jadwal Kelas</h5>
                  </div>
                </div>
              </a>
            </div>



          </div>
        </div>
      </div>      
    </div>
  </div>
</div>



<!-- fullCalendar 2.2.5 -->
<script src="<?php echo(base_url()) ?>assets/moment/moment.min.js"></script>
<script src="<?php echo(base_url()) ?>assets/fullcalendar/main.js"></script>
<!-- <script src="<?php echo(base_url()) ?>assets/adminlte/dist/js/demo.js"></script> -->

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
          }
        });

        calendar.render();
        // $('#calendar').fullCalendar()


      })
      .fail(function() {
        console.log("error");
      });
      
    });


</script>

</body>
</html>

