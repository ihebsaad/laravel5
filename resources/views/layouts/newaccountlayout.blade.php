<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.partials.head')
@include('layouts.partials.headnewaccount')
</head>
<body>
@include('layouts.partials.nav')
@include('layouts.partials.header')
@yield('content')
@include('layouts.partials.footernewaccount')
</body>
</html>