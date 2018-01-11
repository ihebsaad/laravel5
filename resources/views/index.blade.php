@extends('layouts.master')

@section('content')
 @if (Auth::check())
                  <?php \Log::debug('logged  2'. Auth::user()->name ); ?>    
                    @endif


@stop

