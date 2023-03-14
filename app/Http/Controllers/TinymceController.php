<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TinymceController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            "file" => ['max:1200']
        ]);
        $fileName = rand(0, 999999999). '-' . $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => Storage::url($path)]);
    }

    public function delete(Request $request)
    {
        $path = str_replace(env("APP_URL") . "/storage", "", $request->path ?? "");
        if (Storage::exists($path)) {
            Storage::delete($path);
            return response()->json(['message' => "deleted"]);
        }
        return response()->json(['message' => "not found"], 404);
    }
}
