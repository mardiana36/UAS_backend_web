 <!--**********************************
        Scripts
    ***********************************-->

 <script src="app/views/assets/plugins/common/common.min.js"></script>
 <script src="app/views/assets/js/custom.min.js"></script>
 <script src="app/views/assets/js/settings.js"></script>
 <script src="app/views/assets/js/gleek.js"></script>
 <script src="app/views/assets/js/styleSwitcher.js"></script>
 <script src="app/views/assets/js/calendar.js"></script>

 <script src="app/views/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
 <script src="app/views/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
 <script src="app/views/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

 <script src="app/views/assets/plugins/jquery-steps/build/jquery.steps.min.js"></script>
 <script src="app/views/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
 <!-- <script src="app/views/assets/js/plugins-init/jquery-steps-init.js"></script> -->

 <script src="app/views/assets/plugins/moment/moment.js"></script>
 <script src="app/views/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
 <!-- Date Picker Plugin JavaScript -->
 <script src="app/views/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
 <script src="app/views/assets/js/plugins-init/form-pickers-init.js"></script>

 <script>
     $(document).ready(function() {

         var formS = $("#step-form-horizontal");
         formS.validate({
             errorPlacement: function errorPlacement(error, element) {
                 element.before(error);
             },
         });

         formS.children("div").steps({
             headerTag: "h4",
             bodyTag: "section",
             transitionEffect: "slideLeft",
             autoFocus: true,
             labels: {
                 finish: "Submit"
             },
             onStepChanging: function(event, currentIndex, newIndex) {
                 formS.validate().settings.ignore = ":disabled,:hidden";
                 return formS.valid();
             },
             onFinishing: function(event, currentIndex) {
                 formS.validate().settings.ignore = ":disabled";
                 return formS.valid();
             },
             onFinished: function(event, currentIndex) {
                 formS.submit();
             },
         });

         $('#mdate').bootstrapMaterialDatePicker({
             weekStart: 0,
             time: false
         });
         $('#mdate2').bootstrapMaterialDatePicker({
             weekStart: 0,
             time: false
         });
     });
 </script>

 <script src="app/views/assets/plugins/validation/jquery.validate.min.js"></script>
 <script src="app/views/assets/plugins/validation/jquery.validate-init.js"></script>