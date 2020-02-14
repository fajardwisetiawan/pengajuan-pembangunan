
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2019 <a class="text-bold-800 grey darken-2" href="#" target="_blank">Fajar & Maida </a>, All rights reserved. </span></p>
    </footer>

    
		<script src="config.js"></script>
    	<script src="jquery.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/vendors.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="assets/assets/app-assets/js/core/app-menu.min.js"></script>
    <script src="assets/assets/app-assets/js/core/app.min.js"></script>
    <script src="assets/assets/app-assets/js/scripts/customizer.min.js"></script>
    <script src="assets/assets/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
		
    <script src="assets/assets/app-assets/js/scripts/tables/datatables/datatable-styling.min.js"></script>
		
    <script src="assets/assets/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

    <script src="../../../app-assets/js/scripts/modal/components-modal.min.js"></script>


    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.jsapp-assets/vendors/js/forms/extended/typeahead/handlebars.js"></script>
    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.jsapp-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.jsapp-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"></script>
    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.jsapp-assets/js/scripts/forms/extended/form-typeahead.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.jsapp-assets/js/scripts/forms/extended/form-inputmask.min.js"></script>
    <script src="assets/assets/app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.jsapp-assets/js/scripts/forms/extended/form-maxlength.min.js"></script>


    <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
  <script>
  $('#toggle1').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#foto1').removeAttr('disabled'); //enable input

    } else {
        $('#foto1').attr('disabled', true); //disable input
    }
  });
  </script>
  <script>
  
  $('#toggle').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#foto').removeAttr('disabled'); //enable input

    } else {
        $('#foto').attr('disabled', true); //disable input
    }
  });
  </script>

<script>
  
  $('#toggle2').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#foto2').removeAttr('disabled'); //enable input

    } else {
        $('#foto2').attr('disabled', true); //disable input
    }
  });
  </script>

<script>
  
  $('#toggle3').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#lampiran1').removeAttr('disabled'); //enable input

    } else {
        $('#lampiran1').attr('disabled', true); //disable input
    }
  });
  </script>

<script>
  $('#toggle4').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#lampiran2').removeAttr('disabled'); //enable input

    } else {
        $('#lampiran2').attr('disabled', true); //disable input
    }
  });
</script>

<script>
  $('#toggle5').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#lampiran3').removeAttr('disabled'); //enable input

    } else {
        $('#lampiran3').attr('disabled', true); //disable input
    }
  });
</script>

  <script>
  



  var updateInterval = 3000; // in milliseconds

setInterval(function() {
  var randomVal;
  randomVal = getRandomInt(0, 100);

  sysLoad.data('easyPieChart').update(randomVal);
  sysLoad.find('.percent').text(randomVal);
}, updateInterval);

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

});
  </script>
<script>
$(document).ready(function(){
  var jabatan = document.getElementById('jab').value;
//  console.log("Jabatan : "+x);
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
  
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view,jabatan:jabatan},
  dataType:"json",
  success:function(data)
  {
   $('.hasil').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records

// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 2000);
});
</script>
  </body>

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Feb 2019 00:38:38 GMT -->
</html>