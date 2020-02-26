<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("super/_partials/head.php") ?>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
     integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
     crossorigin="">

</head>

<body id="page-top">
  <!-- NAvbar -->
  <?php $this->load->view("super/_partials/navbar.php") ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php $this->load->view("super/_partials/sidebar.php") ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <?php $this->load->view("super/_partials/breadcrumb.php") ?>
        <!-- Icon Cards-->
        <!-- Area Chart Example-->
        <div class="row">
          <div class="col-md-12">
            <div id="map" style="height: 500px;"></div>
          </div>
        </div>
        <!-- Sticky Footer -->
        <?php $this->load->view("super/_partials/footer.php") ?>
      </div>
      <!-- /.content-wrapper -->
    </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("super/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("super/_partials/modal.php") ?>

  <?php $this->load->view("super/_partials/js.php") ?>

  <script src="<?=base_url()?>assets/leaflet/leaflet.css"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>                  
  



<script type="text/javascript">
            var my= L.icon({
              iconUrl: 'http://localhost/gis/assets/img/marker-icon-2x-red.png',
              shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
              iconSize: [25, 41],
              iconAnchor: [12, 41],
              popupAnchor: [1, -34],
            	shadowSize: [41, 41]
            });
            var map = L.map('map').setView([-3.930, 114.434],6);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);


            /*for ( var i=0; i < $lokasi.length; ++i ) 
            {
               L.marker( [$lokasi[i]=latitude, $lokasi[i]=longitude] )
                  .bindPopup( '<a href="' + lokasi[i].url + '" target="_blank">' + lokasi[i].nama + '</a>' )
                  .addTo( map );
            }*/
            /*var da = new Date();
            da.setMonth(da.getMonth()+1);
            var d = da.getDate()+'-'+da.getMonth()+'-'+da.getYear() ;
            alert(d);*/
            /*<?php foreach ($lokasi as $l) {
              ?>
              var marker = L.marker([<?php echo $l->latitude; ?>,<?php echo $l->longitude; ?>]).addTo(map);
              var popup = marker.bindPopup('<b><?php echo $l->nama; ?></b><br/><?php echo $l->alamat; ?></br><b><?php echo $l->telp; ?></b>');
            <?php } ?>*/
            
            /*var data = <?php echo json_encode($lokasi); ?>;
            for (let index = 0; index < data.length; index++) {
              const jt = data[index].jatuh_tempo;
              const latitude = data[index].latitude;
              const longitude = data[index].longitude;
              const nama = data[index].nama;
              const alamat = data[index].alamat;
              const telp = data[index].telp;
              var jt_pisah = jt.split('-');
              var d_pisah = d.split('-');
              var obj = new Date();
              var jt_a = obj.setFullYear(jt_pisah[0], jt_pisah[1], jt_pisah[2]);
              var d_a = obj.setFullYear(d_pisah[0], d_pisah[1], d_pisah[2]);
              var hasil = (d_a - jt_a)/(60*60*24*1000);
              alert(hasil);

              var marker = L.marker([latitude,longitude],{icon: my}).addTo(map);
              var popup = marker.bindPopup('<b>'+nama+'</b><br/>'+alamat+'</br><b>'+telp+'</b>');
            }*/
            <?php $dates = date('d-m-Y');  foreach ($lokasi as $l) { 
              $diff = date_diff(date_create($l->jatuh_tempo),date_create($dates));
              $all = $diff->format('%y Tahun %m Bulan');?>   
              <?php
              if (($all == "0 Tahun 3 Bulan ")||($all=="0 Tahun 2 Bulan")||($all=="0 Tahun 1 Bulan")||($all == "0 Tahun 0 Bulan")) { ?>
                var marker = L.marker([<?php echo $l->latitude; ?>,<?php echo $l->longitude; ?>],{icon: my}).addTo(map);
                var popup = marker.bindPopup('<b><?php echo $l->nama; ?></b><br><?php echo $l->alamat; ?></br><b><?php echo $l->telp; ?></br><b><?php echo $all; ?></b><br><?php echo $l->jatuh_tempo; ?></br>');
              <?php }else{ ?>
                var marker = L.marker([<?php echo $l->latitude; ?>,<?php echo $l->longitude; ?>]).addTo(map);
                var popup = marker.bindPopup('<b><?php echo $l->nama; ?></b><br><?php echo $l->alamat; ?></br><b><?php echo $l->telp; ?></b><br><?php echo $l->jatuh_tempo; ?></br>');
              <?php } ?>
              //var marker = L.marker([<?php echo $l->latitude; ?>,<?php echo $l->longitude; ?>]).addTo(map);
              //var popup = marker.bindPopup('<b><?php echo $l->nama; ?></b><br/><?php echo $l->alamat; ?></br><b><?php echo $l->telp; ?></b>');
            <?php } ?>
              
                //.bindPopup('BANDUNG.<br> Easily customizable.');
               //.openPopup();
</script>
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
     integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
     crossorigin=""></script>
<script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
</body>
</html>
