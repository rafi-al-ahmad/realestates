<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MediaController extends Controller
{
    public function deleteAllTheModelMedia($model)
    {
        if ($model instanceof HasMedia) {
            $model->media->each->delete();
        }
    }

    /**
     * @param $media
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($media)
    {
        $modelClass = Config::get(
            'media-library.media_model',
            \Spatie\MediaLibrary\MediaCollections\Models\Media::class
        );

        $media = $modelClass::findOrFail($media);

        $media->delete();

        return back()->with('error', __("something went wrong! please try again"));
    }
}
