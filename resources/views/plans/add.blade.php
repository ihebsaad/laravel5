@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Add Plan</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'plan.store']) !!}
                <div class="form-group {!! $errors->has('plan') ? 'has-error' : '' !!}">
                    {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'code']) !!}
                    {!! $errors->first('code', '<small class="help-block">:message</small>') !!}
                </div>


                {!! Form::submit('Add   ', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>
    </div>
@endsection