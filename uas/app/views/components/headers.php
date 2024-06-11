<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['page'] ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="app/views/assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="app/views/assets/plugins/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <link href="app/views/assets/css/style.css" rel="stylesheet">
    <link href="app/views/assets/css/styleCalendar.css" rel="stylesheet">

    <link href="app/views/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="app/views/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="app/views/assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="app/views/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="app/views/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="app/views/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <style>
        .dataTables_length label,
        .dataTables_filter label {
            display: flex;
            align-items: center;
        }

        .content-body {
            margin-top: 20px;
        }

        #login input {
            border: none;
        }
        #login .form-group{
            position: relative;
            overflow: hidden;
        }
        #login .form-group::after{
            position: absolute;
            bottom: 0;
            left: 0%;
            content: "";
            min-width: 300px;
            min-height: 2px;
            background-color: #7571F9;
            animation: login infinite 3s ease-in-out;
        }

        @keyframes login {
            0%{
               left: -10%;
            }
            50%{
               left: 60%;
            }
            100%{
                left: -10%;
            }
        }

        #icon-Password1,
        #icon-Password2 {
            font-size: 25px;
            color: #7571F9;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #contentPassword {
            position: relative;
        }

        #headLogin h2 {
            color: #7571F9;
        }
    </style>
</head>

<body>