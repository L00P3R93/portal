    <!-- Base JavaScript -->
    <!--<script src="assets/js/base/jquery-1.10.2.js"></script>-->
    <script src="assets/js/base/jquery-2.2.4.min.js"></script>
    <script src="assets/js/base/smoothscroll.js"></script>
    <script src="assets/js/base/jquery.form.js"></script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/dropzone/dist/dropzone.js"></script>
    <script src="assets/js/bootstrap/popper.js"></script>

    <!-- JQuery UI Tabs JavaScript -->
    <script src="assets/js/base/jquery-ui.js"></script>
	
    <!-- Bootstrap Form Helpers -->
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers.js"></script>
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-colorpicker.js"></script>    
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-datepicker.js"></script>

    <!-- Base JavaScript -->
    <script src="assets/js/base/offcanvas.js"></script>


    <!-- PACE JavaScript -->
    <script src="assets/js/pace/pace.min.js"></script>

    <!-- InstaClick JavaScript -->
    <script src="assets/js/instantclick/instantclick.min.js" data-no-instant></script>

    <script src="assets/js/jspdf.debug.js"></script>
    <script src="assets/js/html2pdf.js"></script>
    <!-- Dropzone -->
    <script type="text/javascript">
        $(function(){
           $("#mdropZone").dropzone({
              url: "../userfiles/appl_uploads",
              maxFiles: 1,
              addRemoveLinks: true
           });
        });
    </script>


    <!-- InstaClick Initialization-->
    <script data-no-instant>
        InstantClick.init();
    </script>

    <!-- WOW JavaScript -->
    <script src="assets/js/wow/wow.js"></script>


    <!-- WOW Initialization-->
    <script>
        new WOW().init();
    </script>

    <script src="assets/js/base/main.js"></script>
    <script src="assets/js/base/plugins.js"></script>


    <script src="assets/lib/tinymce/tinymce.min.js"></script>



    <!-- Initialize the editor. -->
    <script>
        tinymce.init({
            selector: '.editable',
            theme: 'modern',
            statusbar: false,
            browser_spellcheck: true,
            contextmenu: true,
            //width: 750,
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'css/content.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
            mobile: {
                theme: 'mobile',
                plugins: [ 'autosave', 'lists', 'autolink' ],
                toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
            }
        });
    </script>

    <!-- Fade In Javascript -->
    <script>
        $(document).ready(function(){
            $("body").hide(0).delay(100).fadeIn(1000)
        });
    </script>
    
    <!-- Username Checking -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#user_username").keyup(function (e) {
                $(this).val($(this).val().replace(/\s/g, ''));
                var username = $(this).val();
                if(username.length < 1){$("#status").html('');return;}
                if(username.length >= 1){
                    $("#status").html('<img src="assets/img/ajax-loader.gif" />');
                    $.post('components/check-username-availability.php', {'user_username':username}, function(data) {
                      $("#status").html(data);
                    });
                }
            });	
        });
    </script>

    <!-- Image Rotation -->
    <script type="text/javascript">
        var totalCount = 10;
        function ChangeIt() {
            var num =  Math.ceil( Math.random() * totalCount );
            //document.body.background = 'assets/img/backgrounds/background'+num+'.jpg';
            document.body.background = 'assets/img/gap/gap'+num+'.jpg';
            document.body.style.backgroundRepeat = "repeat";
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
           $("#searchbox").Watermark("Search");
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

    <!-- Image Upload Preview
    <script src="assets/js/base/jquery-1.8.0.min.js"></script>-->

    <!-- Avatar Upload Preview -->
    <!-- Avatar Upload Preview -->
    <script type="text/javascript">
        $(function(){
            $("#uploadFile").on("change", function(){
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function(){ // set image data as background of div
                        $("#uploadImagePreview").css("display","block");
                        $("#imagePreview").css("background-image", "url("+this.result+")");
                        $("#imagePreview").css("max-height","223px");
                        $("#imagePreview").css("height","223px");
                    }
                }
            });
        });
    </script>

    <!-- Background Upload Preview -->
    <script type="text/javascript">
        $(function(){
            $("#uploadBackgroundFile").on("change", function(){
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function(){ // set image data as background of div
                        $("#uploadBackgroundImagePreview").css("display","block");
                        $("#imageBackgroundPreview").css("background-image", "url("+this.result+")");
                        $("#imageBackgroundPreview").css("max-height","223px");
                        $("#imageBackgroundPreview").css("height","223px");
                    }
                }
            });
        });
    </script>

    <!-- Append -->
    <script type="text/javascript">
        ChangeIt();
    </script>

     <script>
        $('.carousel').carousel({
          interval: 3500
        })
    </script>

    <script>
        $('#user_firstname').tooltip('toggle')
    </script>

