<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $albums = Album::orderBy('albumtitle','asc')->get();

        return view('album.index',[
          'albums' => $albums,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', 'App\Album');

        $album = new Album();

        return view('album.create',[
          'album' => $album,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', 'App\Album');

        $validatedData = $request->validate([
         'albumtitle' => 'bail|required',
         'description' => 'required',
         'monthyear' =>'required',
        ]);

        // $file = new Filesystem();
        // $album_temp = "app\public";
        // $albumPath=$album_temp."\\".$request->albumtitle;
        // if($file->isDirectory(storage_path($albumPath)))
        // {
        //   return 'Album exists';
        // }
        // else {
        //   $file->makeDirectory(storage_path($albumPath),755,true,true);
        //   $album = new Album();
        //   $request->request->add(['albumpath' => $albumPath]);
        //   $album->fill($request->all());
        //   $album->save();
        //   return redirect()->route('album.index');
        // }
        $album = new Album();
        $album->fill($request->all());
        $album->save();
        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', 'App\Album');

        $album = Album::with('photos')->find($id);
        if(!$album) throw new ModelNotFoundException;

       return view('album.show',[
            'album' => $album,
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('manage', 'App\Album');

        $album = Album::find($id);
        if(!$album) throw new ModelNotFoundException;

        return view('album.edit',[
          'album' => $album
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('manage', 'App\Album');

        $album= Album::find($id);
        if(!$album) throw new ModelNotFoundException;
        $album->fill($request->all());
        $album->save();

        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', 'App\Album');

        $album = Album::find($id);
        $album->delete();

        return redirect()->route('album.index')->with('success', 'Album has been deleted');
    }
}
