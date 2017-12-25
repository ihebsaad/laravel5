@extends('layouts.master')

@section('content')

<?php \Log::debug('logged  2'. Auth::user()->name ); ?>

@stop