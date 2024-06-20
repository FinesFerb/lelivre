<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $slides = Slider::all();
        return view('admin.sliders.main_slider.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.sliders.main_slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->hasFile('path_to_slide')) {
            $path_to_slide = $request->file('path_to_slide');
            $data['path_to_slide'] = $path_to_slide->getClientOriginalName();
            $path_to_slide->storeAs('main_slider', $data['path_to_slide'], 'public');
            Slider::create($data);
        }
        return redirect()->route('main_slides.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slider  $main_slide
     * @return View
     */
    public function edit(Slider $main_slide): View
    {
        return view('admin.sliders.main_slider.edit', compact('main_slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Slider  $main_slide
     * @return RedirectResponse
     */
    public function update(Request $request, Slider $main_slide): RedirectResponse
    {
        if ($request->hasFile('path_to_slide')) {
            $path_to_slide = $request->file('path_to_slide');
            $main_slide->path_to_slide = $path_to_slide->getClientOriginalName();
            $path_to_slide->storeAs('main_slider', $main_slide->path_to_slide, 'public');
            $main_slide->save();
        }
        return redirect()->route('main_slides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Slider  $main_slide
     * @return RedirectResponse
     */
    public function destroy(Slider $main_slide): RedirectResponse
    {
        Storage::delete('main_slider/'.$main_slide->path_to_slide);
        $main_slide->delete();
        return back();
    }
}
