<!DOCTYPE HTML>

<html>

<head>
    <title><?php echo $_GET['dname']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.17.custom.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="assets/js/jspdf.debug.js"></script>
    <script type="text/javascript" src="assets/js/addimage.js"></script>
    <!--<script type="text/javascript" src="assets/js/from_html.js"></script>
    <script type="text/javascript" src="../plugins/standard_fonts_metrics.js"></script>
    <script type="text/javascript" src="../plugins/split_text_to_size.js"></script>
    <script type="text/javascript" src="../plugins/from_html.js"></script>
    -->
    <style type="text/css">
        iframe{
            width: 100%;
            height: 100%;
        }

    </style>
    <script>
        $(function() {
            $("#accordion-basic, #accordion-text, #accordion-graphic").accordion({
                autoHeight: false,
                navigation: true
            });
            $( "#tabs" ).tabs();
            $(".button").button();
        });
    </script>
</head>

<body>
    <iframe frameborder="0" src="../userfiles/appl_uploads/<?php echo $_GET['dname']; ?>"></iframe>
</body>

</html>