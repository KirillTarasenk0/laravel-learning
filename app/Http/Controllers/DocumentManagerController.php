<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\DocumentStorage;
use App\Http\Requests\DocumentValidateRequest;
use Illuminate\Support\Facades\Storage;

class DocumentManagerController extends Controller
{
    public function store(DocumentValidateRequest $request): JsonResponse
    {
        $request->validated();
        $file = $request->file('document');
        $existingDocument = DocumentStorage::where('fileName', $file->getClientOriginalName())->first();
        if ($existingDocument) {
            if (!Storage::put('secondDocumentsStorage', $file)) {
                return response()->json(['status' => 'not ok'], 404);
            }
            $existingDocument->filePath = 'secondDocumentsStorage/' . $file->hashName();
            $existingDocument->fileVersion += 1;
            $existingDocument->save();
        } else {
            if (!Storage::put('firstDocumentsStorage', $file)) {
                return response()->json(['status' => 'not ok'], 404);
            }
            DocumentStorage::create([
               'fileName' => $file->getClientOriginalName(),
               'filePath' => 'firstDocumentsStorage/' . $file->hashName(),
               'fileVersion' => 1
            ]);
        }
        return response()->json(['status' => 'ok']);
    }
}
