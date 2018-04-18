<?php
use App\Common;
?>
@extends('layouts.app')

@section('content')
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif
<div class="panel-body">
  <!--New Form -->
  {!! Form::model($photo,[
    'route'=> ['photo.store'],
    'class' => 'form-horizontal',
    'enctype' => 'multipart/form-data',
    ]) !!}


    {!!Form::hidden('albumidreference',$albumidreference)!!}
    {!!Form::hidden('albumtitle',$albumtitle)!!}

  <!--Photo Title-->
  <div class="form-group row">
      {!! Form::label('photo-title','Photo Title',[
        'class' => 'control-label col-sm-3',
        ]) !!}
        <div class="col-sm-3">
              {!! Form::text('phototitle',null,[
                'id' => 'photo-title',
                'class' => 'form-control',
                //'maxlength' => 20,
                ])!!}
        </div>
  </div>

  <div class="form-group row">
      {!! Form::label('photo-upload','Upload Photo',[
        'class' => 'control-label col-sm-3'
        ]) !!}
        <div class="col-sm-3">
              {!! Form::file('photo',[
                'id' => 'photo_id',
                'class' => 'form-control',
                ])!!} <br>
        </div>

    <!-- Submit Button -->
    <div class="form-group row">
      <div class="col-sm-offset-3 col-sm-6">
        {!! Form::button('Submit',[
          'type' =>'submit',
          'class' => 'btn btn-primary',
          ])!!}
        </div>
      </div>
    {!! Form::close() !!}
</div>

@endsection
