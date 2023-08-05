<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");


?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/event-calendar-evo/') ?>evo-calendar/css/evo-calendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/event-calendar-evo/') ?>evo-calendar/css/evo-calendar.midnight-blue.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/event-calendar-evo/') ?>esc/esc-intech.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">


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
      <a href="<?php echo site_url('pengajuanjadwal') ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah Jadwal</a>
    </div>
    <div class="col-md-12 mt-5">

      <section id="demos">
                  <div class="section-content">
                      <div class="console-log">
                          <div class="log-content">
                              <div class="--noshadow" id="demoEvoCalendar"></div>
                          </div>
                      </div>
                      <div class="action-buttons">
                        <!-- <a href="" class="btn-action">Tambah Jadwal</a> -->
                          
                      </div>
                  </div>
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

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/event-calendar-evo/') ?>evo-calendar/js/evo-calendar.min.js"></script>

<script type="text/javascript">

  var table;
  
  $(document).ready(function() {


    


  }); //end (document).ready

  
  $(document).on("click", "#hapus", function(e) {
    var link = $(this).attr("href");
    var idjadwalevent = $(this).attr('data-idjadwalevent');

    e.preventDefault();


    swal({
          title: "Hapus data ini?",
          text: "Jika anda pilih ya, data akan dihapus dari sistem!",
          icon: "warning",
          buttons: ["Batal!", "Ya!"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            $.ajax({
              url: '<?php echo site_url('penjadwalan/cekJadwalTanggalLebihDariSatu') ?>',
              type: 'GET',
              dataType: 'json',
              data: {'idjadwalevent': idjadwalevent},
            })
            .done(function(cekJadwalTanggalLebihDariSatuResult) {
              console.log("success");
              if (cekJadwalTanggalLebihDariSatuResult) {

                swal({
                  title: "Peringatan!",
                  text: "Jadwal ini merupakan range dari beberapa tanggal jadwal. Menghapus data ini akan menghapus rentetan tanggal jadwal yang berkaitan!",
                  icon: "warning",
                  buttons: ["Batal!", "Ya!"],
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    document.location.href = link;
                  }
                });

              }else{
                document.location.href = link;
              }
            })
            .fail(function() {
              console.log("error cekJadwalTanggalLebihDariSatu");
            });


          }
        });



    
    
    

  });  
  



</script>


<script>
  

  var defaultTheme = getRandom(4);

var today = new Date();

var events = [ {
    id: "imwyx6S",
    name: "Event #3",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/18/" + today.getFullYear(),
    type: "event"
}, {
    id: "9jU6g6f",
    name: "Holiday #1",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/10/" + today.getFullYear(),
    type: "holiday"
}, {
    id: "0g5G6ja",
    name: "Event #1",
    description: "Lorem ipsum dolor sit amet.",
    date: [ today.getMonth() + 1 + "/2/" + today.getFullYear(), today.getMonth() + 1 + "/5/" + today.getFullYear() ],
    type: "event",
    everyYear: !0
}, {
    id: "y2u7UaF",
    name: "Holiday #3",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/23/" + today.getFullYear(),
    type: "holiday"
}, {
    id: "dsu7HUc",
    name: "Birthday #1",
    description: "Lorem ipsum dolor sit amet.",
    date: new Date(),
    type: "birthday"
}, {
    id: "dsu7HUc",
    name: "Birthday #2",
    description: "Lorem ipsum dolor sit amet.",
    date: today.getMonth() + 1 + "/27/" + today.getFullYear(),
    type: "birthday"
} ];


var active_events = [];

var week_date = [];

var curAdd, curRmv;

function getRandom(a) {
    return Math.floor(Math.random() * a);
}


function getWeeksInMonth(a, b) {
    var c = [], d = new Date(b, a, 1), e = new Date(b, a + 1, 0), f = e.getDate();
    var g = 1;
    var h = 7 - d.getDay();
    while (g <= f) {
        c.push({
            start: g,
            end: h
        });
        g = h + 1;
        h += 7;
        if (h > f) h = f;
    }
    return c;
}

week_date = getWeeksInMonth(today.getMonth(), today.getFullYear())[2];

$(document).ready(function() {

  $.ajax({
    url: '<?php echo site_url('penjadwalan/getJadwalKalender') ?>',
    type: 'GET',
    dataType: 'json',
  })
  .done(function(getjadwalibadahresult) {
    const jadwal = [];
    console.log(getjadwalibadahresult);

    for (var i = 0; i < getjadwalibadahresult.length; i++) {

      var buttonhapus = '<a href="<?php echo site_url('penjadwalan/delete/') ?>'+getjadwalibadahresult[i]['idjadwalevent']+'" id="hapus" data-idjadwalevent="'+getjadwalibadahresult[i]['idjadwalevent']+'"><i class="fa fa-trash text-danger"></i></a>';

      var badge = getjadwalibadahresult[i]['jammulai'];

      var description = '';
      switch(getjadwalibadahresult[i]['jenisjadwal']) {
        case 'Jadwal Ibadah':
          description = getjadwalibadahresult[i]['tema'];
          break;
        case 'Kelas Next Step':
          description = getjadwalibadahresult[i]['deskripsi'];
          break;
        default:
          description = getjadwalibadahresult[i]['deskripsi'];
          break;
      }

      description = getjadwalibadahresult[i]['namaevent']+'<br> <a href="" id="btnlihat" class="btn btn-primary btn-sm" data-idjadwalevent="'+getjadwalibadahresult[i]['idjadwalevent']+'"><i class="fa fa-search"></i></a> | <a href="<?php echo site_url('penjadwalan/delete/') ?>'+getjadwalibadahresult[i]['idjadwalevent']+'" id="hapus" class="btn btn-danger btn-sm" data-idjadwalevent="'+getjadwalibadahresult[i]['idjadwalevent']+'"><i class="fa fa-trash"></i></a>';

      jadwal.push({
        id: getjadwalibadahresult[i]['idjadwalevent'],
        name: getjadwalibadahresult[i]['jenisjadwal'],
        date: getjadwalibadahresult[i]['tglmulai'],
        description: description,
        type: "event",
        badge: badge,
        everyYear:false
      }); 
    }
    console.log(jadwal);

    $("#demoEvoCalendar").evoCalendar({
        format: "yyyy/m/dd",
        titleFormat: "MM",
        theme: 'Midnight Blue',
        sidebarDisplayDefault: false,
        calendarEvents: jadwal
    });

    
  })
  .fail(function() {
    console.log("error getjadwalibadahresult");
  });
    
    $("#addBtn").click(function(a) {
        curAdd = getRandom(events.length);
        $("#demoEvoCalendar").evoCalendar("addCalendarEvent", events[curAdd]);
        active_events.push(events[curAdd]);
        events.splice(curAdd, 1);
        console.log(curAdd);

        // if (0 === events.length) a.target.disabled = !0;
        // if (active_events.length > 0) $("#removeBtn").prop("disabled", !1);
    });

    // $("#demoEvoCalendar").evoCalendar({
    //     format: "yyyy/mm/dd",
    //     titleFormat: "MM",
    //     calendarEvents: [{
    //         id: "d8jai7s",
    //         name: "Author's Birthday",
    //         description: "Author's note: Thank you for using EvoCalendar! :)",
    //         date: "February/15/1999",
    //         type: "birthday",
    //         everyYear: !0
    //     }, {
    //         id: "sKn89hi",
    //         name: "1-Week Coding Bootcamp",
    //         description: "Lorem ipsum dolor sit amet.",
    //         badge: "5-day event",
    //         date: [ today.getMonth() + 1 + "/" + week_date.start + "/" + today.getFullYear(), today.getMonth() + 1 + "/" + week_date.end + "/" + today.getFullYear() ],
    //         type: "event",
    //         everyYear: !0
    //     }, {
    //         id: "in8bha4",
    //         name: "Holiday #2",
    //         description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    //         date: today,
    //         type: "holiday"
    //     }, {
    //         id: "in8bha4",
    //         name: "Event #2",
    //         date: today,
    //         type: "event"
    //     }]
    // });

});

</script>
</body>
</html>

