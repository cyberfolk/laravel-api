<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Type\StoreTypeRequest;
use App\Http\Requests\Type\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderByDesc('id')->paginate(6);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Type\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $val_data = $request->validated();
        $slug = Type::generateSlug($val_data['name']);
        $val_data['slug'] = $slug;

        if ($request->hasFile('link_cover')) {
            $image_path = Storage::put('uploads', $request->link_cover);
            $val_data['link_cover'] = $image_path;
        }

        Type::create($val_data);
        return to_route('admin.types.index')->with('message', "Type: " . $val_data['name'] . " created succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Type\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $val_data = $request->validated();
        $slug = Type::generateSlug($val_data['name']);
        $val_data['slug'] = $slug;

        if ($request->hasFile('link_cover')) {
            if ($type->link_cover) {
                Storage::delete($type->link_cover);
            }
            $image_path = Storage::put('uploads', $request->link_cover);
            $val_data['link_cover'] = $image_path;
        }

        $type->update($val_data);
        return to_route('admin.types.index')->with('message', "Type: $type->name update succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if ($type->link_cover) {
            Storage::delete($type->link_cover);
        }
        $type->delete();
        return to_route('admin.types.index')->with('message', "Type: $type->title deleted succesfully");
    }
}
