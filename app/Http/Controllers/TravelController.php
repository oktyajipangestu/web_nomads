<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelRequest;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.travel.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->post('name'));
        $data['address'] = $request->post('address');
        $data['description'] = $request->post('description');
        // UPLOAD FOTO
        $picture = $request->file('file');
        $path = $picture->storePubliclyAs('images', $picture->getClientOriginalName(), 'public');
        $data['thumbnail'] = $path;
        // ADDING TO DATABASE
        $travel = Travel::create($data);
        if ($travel) {
            return redirect()->route('admin.travel.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $data = Travel::where('slug', $slug)->first();
        return view('admin.pages.travel.edit', [
            'travel' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except(['_method','_token','file']);
        $data['slug'] = Str::slug($request->post('name'));
        // UPLOADING FILE
        if ($request->file('file')) {
            $picture = $request->file('file');
            $path = $picture->storePubliclyAs('images', $picture->getClientOriginalName(), 'public');
            $data['thumbnail'] = $path;
        }
        // UPDATE WISATA
        $travel = Travel::where('id', $id)
            ->update($data);
        if ($travel) {
            return redirect()->route('admin.travel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
