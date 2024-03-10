<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\FileStorage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadingFilesController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $file = $request->file('file');
        if (!Storage::put('secondTaskStorage', $file)) {
            return response()->json(['status' => 'not ok'], 404);
        }
        FileStorage::create([
             'filePath' => 'secondTaskStorage/'.$file->hashName()
        ]);
        return response()->json(['status' => 'ok']);
    }
}
