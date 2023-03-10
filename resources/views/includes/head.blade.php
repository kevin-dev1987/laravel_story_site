<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset ('css/pagination.css')}}" type="text/css">
    <link rel="stylesheet" href="{{mix ('css/app.css')}}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{mix ('js/app.js')}}" defer></script>
    <title>Laravel Story Website</title>
</head>
<body>