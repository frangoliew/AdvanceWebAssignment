<?php
use App\Common;
use App\Photo;
 ?>
@extends('layouts.app')

@section('content')
    <h1 align="center">{{$album->albumtitle}}</h1>
    <a class="button secondary" href="\album">Back</a>
    <div align="center">
          <a class="button" href="/photo/create/{{$album->id}}">Upload Photo To Album</a>
    </div>

    <hr>

    <!-- Show all the photo available -->
    <div class='panel-body'>
      @if(count($album->photos)>0)
        @foreach($album->photos as $photo)
        <div class="tablecontainer col-sm-4">
          <div class="column_1 col-sm-6">
            <a href="/photo/{{$photo->id}}">
              <div class="imageshow">
                <img style='height:60%; width:60%;' src="/storage/{{$album->albumtitle . '/' . $photo->id . '.jpg'}}" >
              </div>
              <div class="albums_title">
                Photo Title: {{$photo->phototitle}}
              </div>
            </a>
          </div>
          <div class="column_2 col-sm-6">
            <div class="buttonedit">
              {!! link_to_route(
                'photo.edit',
                $title = 'Edit',
                $parameters = ['id' => $photo->id ],
                $attributes = ['class' => 'btn btn-primary']
                )!!}
            </div>
            <div class="buttondelete">
              {!! link_to_route(
                'photo.destroy',
                $title = 'Delete',
                $parameters = ['id' => $photo->id ],
                $attributes = ['class' => 'btn btn-primary']
                )!!}
                </div>
            </div>
          </div>
        </div>
        @endforeach
      @else
        <div>
          No photo has been created yet
        </div>
      @endif
    </div>
@endsection
