<?php  
  $this->load->view("template/header");
  $this->load->view("template/topmenu");
  $this->load->view("template/sidemenu");


?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/event-calendar-evo/') ?>evo-calendar/css/evo-calendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/event-calendar-evo/') ?>evo-calendar/css/evo-calendar.orange-coral.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/event-calendar-evo/') ?>demo/demo.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">


  <div class="row" id="toni-breadcrumb">
    <div class="col-6">
        <h4 class="text-dark mt-2">Jadwal Ibadah</h4>
    </div>  
    <div class="col-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo(site_url()) ?>">Home</a></li>
        <li class="breadcrumb-item active">jadwalibadah</li>
      </ol>
      
    </div>
  </div>

  <div class="row" id="toni-content">
    <div class="col-12">
      <a href="<?php echo(site_url('Jadwalibadah/tambah')) ?>" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus-circle"></i> Tambah jadwal</a>
    </div>
    <div class="col-md-12">

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


    <!-- jQuery -->
    <script src="<?php echo base_url('assets/event-calendar-evo/') ?>evo-calendar/js/evo-calendar.min.js"></script>

<script type="text/javascript">

  var table;
  
  $(document).ready(function() {


    


  }); //end (document).ready

  
  $(document).on("click", "#hapus", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();
    bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result) {
      if (result) {
        document.location.href = link;
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
    url: '<?php echo site_url('jadwalibadah/getjadwalibadah') ?>',
    type: 'GET',
    dataType: 'json',
  })
  .done(function(getjadwalibadahresult) {
    const jadwal = [];

    for (var i = 0; i < getjadwalibadahresult.length; i++) {
      jadwal.push({
        id: getjadwalibadahresult[i]['idjadwalibadahmingguan'],
        name: getjadwalibadahresult[i]['tema'],
        date: getjadwalibadahresult[i]['tanggaljadwal'],
        type: "event",
        everyYear:false
      }); 
    }
    console.log(jadwal);

    $("#demoEvoCalendar").evoCalendar({
        format: "yyyy/m/dd",
        titleFormat: "MM",
        theme: 'Orange Coral',
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

