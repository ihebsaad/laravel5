<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.partials.head')
@include('layout.partials.headnewaccount')
</head>
<body>
@include('layout.partials.nav')
@include('layout.partials.header')
@yield('content')
@include('layout.partials.footernewaccount')
</body>
</html>