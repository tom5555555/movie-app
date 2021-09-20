<?php

namespace MovieApp\Http\Controllers;

use Illuminate\Http\Request;
use MovieApp\Video;

class VideoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        if(request()->wantsJson()) {
            return $video;
        }

        return view('video', compact('video'));
    }

 
}
