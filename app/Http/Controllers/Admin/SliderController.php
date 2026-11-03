<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.slider', compact('sliders'));
    }

    public function create()
    {
        return view('admin.tambah-slider');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'button_text' => 'required|string|max:100',
            'button_link' => 'required|url',
            'button_color_class' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        // Upload ke public/uploads/slider
        $file = $request->file('image');

        $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

        $destinationPath = public_path('uploads/slider');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

        $validated['image_path'] = $filename;

        Slider::create($validated);

        return redirect()->route('admin.slider')
            ->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.edit-slider', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'button_text' => 'required|string|max:100',
            'button_link' => 'required|url',
            'button_color_class' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {

            // Hapus gambar lama
            $oldPath = public_path('uploads/slider/'.$slider->image_path);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('image');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/slider');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $validated['image_path'] = $filename;
        }

        $slider->update($validated);

        return redirect()->route('admin.slider')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        // Hapus file gambar
        $path = public_path('uploads/slider/'.$slider->image_path);

        if (file_exists($path)) {
            unlink($path);
        }

        $slider->delete();

        return redirect()->route('admin.slider')
            ->with('success', 'Slider deleted successfully.');
    }
}