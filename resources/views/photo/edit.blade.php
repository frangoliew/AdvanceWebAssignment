<?php
use App\Common;
?>
@extends('layouts.app')

@section('content')

<div class="panel-body">
    <!--New Form -->
    {!! Form::model($photo,[
      'route'=> ['photo.update', $photo->id],
      'method' =>'put',
      'class' => 'form-horizontal'
      ]) !!}


  <!--Photo Title-->
  <div class="form-group row">
      {!! Form::label('photo-title','Photo Title',[
        'class' => 'control-label col-sm-3',
        ]) !!}
        <div class="col-sm-9">
              {!! Form::text('phototitle',$photo->phototitle,[
                'id' => 'album-title',
                'class' => 'form-control',
                //'maxlength' => 20,
                ])!!}
        </div>
  </div>
    <!-- Submit Button -->
    <div class="form-group row">
      <div class="col-sm-offset-3 col-sm-6">
        {!! Form::button('Update',[
          'type' =>'submit',
          'class' => 'btn btn-primary',
          ])!!}
        </div>
      </div>
    {!! Form::close() !!}
</div>

@endsection
