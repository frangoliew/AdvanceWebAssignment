<?php
use App\Common;
?>
@extends('layouts.app')

@section('content')

<div class="panel-body">
    <!--New Form -->
    {!! Form::model($album,[
      'route'=> ['album.update', $album->id],
      'method' =>'put',
      'class' => 'form-horizontal'
      ]) !!}


  <!--Album Title-->
  <div class="form-group row">
      {!! Form::label('album-title','Album Title',[
        'class' => 'control-label col-sm-3',
        ]) !!}
        <div class="col-sm-9">
              {!! Form::text('albumtitle',$album->albumtitle,[
                'id' => 'album-title',
                'class' => 'form-control',
                //'maxlength' => 20,
                ])!!}
        </div>
  </div>

  <!--Description-->
  <div class="form-group row">
      {!! Form::label('album-description','Description',[
        'class' => 'control-label col-sm-3',
        ]) !!}
        <div class="col-sm-9">
              {!! Form::textarea('description',$album->description,[
                'id' =>'description',
                'class' =>'form-control',
                //'maxlength' => 50,
              ])!!}
        </div>
  </div>

  <!--Album Date-->
  <div class="form-group row">
    {!! Form::label('album-date','Date(mm-dd-yy)',[
      'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
      {!! Form::date('monthyear',$album->monthyear,[
        'id' => 'album-monthyear',
        'class' => 'form-control',
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
