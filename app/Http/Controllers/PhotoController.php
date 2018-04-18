<?php

namespace App\Http\Controllers;
use App\Photo;
use App\Album;
use Illuminate\Http\Request;

class PhotoController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($albumidreference)
    {
        $this->authorize('create', 'App\Photo');

        $photo = new Photo();
        $album = Album::find($albumidreference);
        $albumtitle = $album->albumtitle;
        return view('photo.create',[
          'photo' =>$photo,
          'albumidreference' => $albumidreference,
          'albumtitle' => $albumtitle,
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
      $this->authorize('create', 'App\Photo');

      $validatedData = $request->validate([
       'phototitle' => 'bail|required',
      ]);

        //Directory name
        $directoryName= $request->input('albumtitle');
        var_dump($directoryName);

        //Get Extension
        //$extension = $request->file('photo')->getClientOriginalExtension();



        $photo = new Photo();
        $tempref = $request->input('albumidreference');
        $request->request->add(['photopath' => null]);
        $request->request->add(['albumidreference' => $tempref]);
        $photo->fill($request->all());
        $photo->save();
        // $photo->photopath = $photo->id;

        //create file namespace
        $filenameToStore = $photo->id.'.jpg';

        //Upload Image
        $photoPath = $request->file('photo')->storeAs('public/'.$directoryName . '/' , $filenameToStore);
        $photo->fill(['photopath' => $photoPath]);
        $photo->save();

        return redirect('/album/'.$request->input('albumidreference'))->with('success','Photo Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view', 'App\Photo');

      $photo = Photo::with('albums')->find($id);
      if(!$photo) throw new ModelNotFoundException;

      return view('photo.show',[
          'photo' => $photo,
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
      $this->authorize('manage', 'App\Photo');

      $photo = Photo::find($id);
      if(!$photo) throw new ModelNotFoundException;

      return view('photo.edit',[
        'photo' => $photo,
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
      $this->authorize('manage', 'App\Photo');

        $photo= Photo::find($id);
        if(!$photo) throw new ModelNotFoundException;
      //  var_dump($photo);
        $photo->fill($request->all());
        $photo->save();

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
      $this->authorize('delete', 'App\Photo');

      $photo = Photo::find($id);
      $photo->delete();

      return redirect()->route('album.index')->with('success', 'Photo has been deleted');
    }
}
