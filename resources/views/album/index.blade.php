<?php
use App\Common;
 ?>
@extends('layouts.app')

@section('content')
  <div align='center' class='top-body'>
    {!! link_to_route(
      'album.create',
      $title = 'Create Album',
      $parameters = [],
      $attributes = ['class' => 'btn btn-primary']
      )!!}
  </div>
  <div class='panel-body'>
    @if(count($albums)>0)
      @foreach($albums as $i => $album)
      <div class="tablecontainer col-sm-4 border">
        <div class="column_1 col-sm-6">
          <a href="/album/{{$album->id}}">
            <div class="imageshow">
            </div>
            <div class="albums_title">
              Album Title: {{$album->albumtitle}}
            </div>
            <div class="month_year">
              Date of Album: {{$album->monthyear}}
            </div>
            <div class="album_description">
              Description: {{$album->description}}
            </div>
          </a>
        </div>

        <div class="column_2 col-sm-6">
            <div class="buttonedit">
              {!! link_to_route(
                'album.edit',
                $title = 'Edit',
                $parameters = ['id' => $album->id ],
                $attributes = ['class' => 'btn btn-primary']
                )!!}
            </div>
            <div class="buttondelete">
              {!! Form::open([
                'route' => ['album.destroy', $album->id],
                'method' => 'delete',
                'class' => 'form-inline',
                ])!!}
                <div>
                  {!! Form::button('Delete',[
                    'type' => 'delete',
                    'class' => 'btn btn-primary'
                    ])!!}
                </div>
            </div>
        </div>
      </div>
      @endforeach
    @else
      <div>
        No albums has been created yet
      </div>
    @endif
    {!! Form::close() !!}
  </div>
@endsection
