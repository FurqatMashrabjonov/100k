<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thumbnails example - fileuploader - Innostudio.de</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Thumbnails example - fileuploader - Innostudio.de">
    <meta name="robots" content="noindex">

    <link rel="shortcut icon" href="https://innostudio.de/fileuploader/images/favicon.ico">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="{{asset("admin/css/font-fileuploader.css")}}" rel="stylesheet">
    <link href="{{asset("admin/css/jquery.fileuploader.min.css")}}" media="all" rel="stylesheet">
    <link href="{{asset("admin/css/jquery.fileuploader-theme-thumbnails.css")}}" media="all" rel="stylesheet">

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="{{asset("admin/js/jquery.fileuploader.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("admin/js/custom.js")}}" type="text/javascript"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            line-height: normal;
            background-color: #fff;

            margin: 0;
        }

        form {
            margin: 15px;
        }

        .fileuploader {
            max-width: 643px;
        }
    </style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
    <!-- file input -->
    <input type="file" name="files">

    <input type="submit">
</form>
</body>
</html>