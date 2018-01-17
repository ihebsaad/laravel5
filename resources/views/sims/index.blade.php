@extends('template')

@section('header')
    <div class="btn-group pull-right">
        {!! link_to('language', session('locale') == 'fr' ? 'English' : 'Français', ['class' => 'btn btn-primary']) !!}
        @if(Auth::check())
            {!! link_to_route('sim.create', trans('blog.creation'), [], ['class' => 'btn btn-info']) !!}
            {!! link_to('logout', trans('blog.logout'), ['class' => 'btn btn-warning']) !!}
        @else
            {!! link_to('login', trans('blog.login'), ['class' => 'btn btn-info pull-right']) !!}
        @endif
    </div>
@endsection

@section('contenu')
    @if(isset($info))
        <div class="row alert alert-info">{{ $info }}</div>
    @endif
    {!! $links !!}
    @foreach($sims as $sim)
        <article class="row bg-primary">
            <div class="col-md-12">
                <header>
                    <h1>{{ $sim->pin }}

                    </h1>
                </header>
                <hr>
                <section>
                    <p>{{ $sim->sim }}</p>
                    @if(Auth::check() and Auth::user()->admin)
                        {!! Form::open(['method' => 'DELETE', 'route' => ['sim.destroy', $sim->id]]) !!}
                        {!! Form::submit(trans('blog.delete'), ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'' . trans('blog.confirm') . '\')']) !!}
                        {!! Form::close() !!}
                    @endif
                    <em class="pull-right">
                        <span class="glyphicon glyphicon-pencil"></span> {{ $sim->created_at }}
                    </em>
                </section>
            </div>
        </article>
        <br>
    @endforeach
    {!! $links !!}
@endsection