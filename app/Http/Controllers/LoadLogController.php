<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LoadLogController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $file = $request->file('file');
        if (!Storage::put('fileStorage', $file)) {
            return response()->json(['status' => 'not ok'], 404);
        }
        Log::info('File info', [
            'File name' => $file->getClientOriginalName(),
            'File size' => $file->getSize(),
            'Upload date' => now(),
            'User ip' => $request->ip()
        ]);
        return response()->json(['status' => 'ok']);
    }
}
