<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    private int $productRating = 0;
    private int $usersCount = 0;
    public function add(Request $request)
    {
        if ($request->has('sendRating')) {
            $this->usersCount++;
            $this->productRating = $request->input('ladtop') + $request->input('tv') + $request->input('car');
            ProductRating::create([
               'mark' => $this->productRating
            ]);
        }
        return redirect()->route('pages');
    }
    public function index(): View
    {
        $productMarks = ProductRating::select('mark')->get();
        $productCount = ProductRating::count();
        $averageRating = 0;
        foreach ($productMarks as $mark) {
            $averageRating += $mark['mark'];
        }
        $averageRating /= $productCount;
        return view('layouts.app')->with('averageRating', $averageRating);
    }
}
