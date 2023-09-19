<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlateImage;

class PlateImageController extends Controller
{
    public function index()
    {
        $plateImages = PlateImage::all();
        return view('plateimage.index', compact('plateImages'));
    }

    public function create()
    {
        return view('plateimage.create');
    }

    public function store(Request $request)
    {
        $plateImage = new PlateImage([
            'isPrimary' => $request->get('isPrimary'),
            'plateId' => $request->get('plateId'),
            'imageBlob' => $request->get('imageBlob'),
            'mimetype' => $request->get('mimetype')
        ]);

        $plateImage->save();
        return redirect('/plateimages')->with('success', 'Plate Image saved!');
    }

    public function show(PlateImage $plateImage)
    {
        return view('plateimage.show', compact('plateImage'));
    }

    public function edit(PlateImage $plateImage)
    {
        return view('plateimage.edit', compact('plateImage'));
    }

    public function update(Request $request, PlateImage $plateImage)
    {
        $plateImage->isPrimary = $request->get('isPrimary');
        $plateImage->plateId = $request->get('plateId');
        $plateImage->imageBlob = $request->get('imageBlob');
        $plateImage->mimetype = $request->get('mimetype');

        $plateImage->save();
        return redirect('/plateimages')->with('success', 'Plate Image updated!');
    }

    public function destroy(PlateImage $plateImage)
    {
        $plateImage->delete();
        return redirect('/plateimages')->with('success', 'Plate Image deleted!');
    }
}
