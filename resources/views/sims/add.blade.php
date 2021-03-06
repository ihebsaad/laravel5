@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">ADD Sim</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'sim.store']) !!}
                <div class="form-group {!! $errors->has('sim') ? 'has-error' : '' !!}">
                    {!! Form::text('sim', null, ['class' => 'form-control', 'placeholder' => 'sim']) !!}
                    {!! $errors->first('sim', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
                    {!! Form::text ('pin', null, ['class' => 'form-control', 'placeholder' => 'pin']) !!}
                    {!! $errors->first('pin', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('enabled', 1, null) !!} Enabled
                        </label>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                    {!! Form::text('tags', null, array('class' => 'form-control', 'placeholder' => 'Entrez les plans séparés par des virgules')) !!}
                    {!! $errors->first('tags', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@endsection