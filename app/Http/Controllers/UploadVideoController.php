<?php

namespace MovieApp\Http\Controllers;

use Illuminate\Http\Request;
use MovieApp\Channel;
use MovieApp\Jobs\Videos\ConvertForStreaming;
use MovieApp\Jobs\Videos\CreateVideoThumbnail;

class UploadVideoController extends Controller
{
    public function index(Channel $channel) {

        return view('channels.upload', [
            'channel' => $channel
        ]);
    }

    public function store(Channel $channel){
    
        $video = $channel->videos()->create([
            'title' => request()->title,
            'path' => request()->video->store("channels/{$channel->id}")
        ]);

        $this->dispatch(new CreateVideoThumbnail($video));

        $this->dispatch(new ConvertForStreaming($video));

        return $video;
    }
}
