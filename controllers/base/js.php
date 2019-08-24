<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="assets/js/easing.min.js"></script>
<script src="assets/js/hoverIntent.js"></script>
<script src="assets/js/superfish.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.tabs.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/mail-script.js"></script>
<script src="assets/dropzone/dist/dropzone.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jspdf.debug.js"></script>
    <!-- Dropzone -->
    <script type="text/javascript">
        $(function(){
           $("#mdropZone").dropzone({
                url: "components/",
                params: "file",
                maxFiles: 1,
                addRemoveLinks: true
           });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#receipt').hide('fast');
            $('#mpesa').hide('fast');
        });
        $('#ireceipt').click(function(){
            $('#receipt').show('slow', 'linear');
            $('#mpesa').hide('slow', 'linear');
        });
        $('#impesa').click(function(){
            $('#mpesa').show('slow', 'linear');
            $('#receipt').hide('fast');
        });

    </script>

     <script type="text/javascript">
        //var usn = <?php echo $_SESSION['username']; ?>;
        //var url = 'courses.php?user_name='+usn;
        function checkCourse(form){
            var applid = form.course_id.value;
            if(applid == ""){
                alert("Error! You MUST Select a Course Inorder to Continue");
                return false;
                /*var d = confirm("Error! No Course Selected. Do You Wish To Select a Course?"+usn);
                if(d == true){
                    return false;
                    window.location = url;
                }else{
                    return false;
                } */
            }else{
                return true;
            }
        }
    </script>

    <!-- Search Form -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".search").keyup(function() {
                var searchbox = $(this).val();
                var dataString = 'searchword='+ searchbox;
                if(searchbox==''){
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "components/search.php",
                        data: dataString,
                        cache: false,
                        success: function(html){
                            $("#display").html(html).show();
                        }
                    });
                }return false;
            });
        });
        jQuery(function($){
           $("#search-product").Watermark("Search");
       });
    </script>

    <!-- Closing the Search Form when clicked outside it -->
    <script type="text/javascript">
        $(document).mouseup(function (e){
            var container = $("#display");
            if (!container.is(e.target) && container.has(e.target).length === 0){
                container.hide();
            }
        });
    </script>