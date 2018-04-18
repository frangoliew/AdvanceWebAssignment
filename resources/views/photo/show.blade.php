<?php
use App\Common;
 ?>
@extends('layouts.app')

@section('content')
    <h1 align="center">{{$photo->phototitle}}</h1>
    <a class="button secondary" href="\album\{{$photo->albums->id}}">Back</a>
    <hr>

    <!-- Show all the photo available -->
    <div class='panel-body'>
        <div class="tablecontainer col-sm-4 border">
          <div class="column_1 col-sm-6">
              <div class="imageshow">
                <img style='height:100%; width:100%;' src="/storage/{{$photo->albums->albumtitle . '/' . $photo->id . '.jpg'}}" >
              </div>
              <div class="albums_title">
                Photo Title: {{$photo->phototitle}}
              </div>
          </div>
        </div>
    </div>
@endsection
