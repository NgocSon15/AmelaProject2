<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->headquarter = $request->input('headquarter');
        $brand->founded_date = $request->input('founded_date');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $brand->image = $path;
        }

        $brand->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('brand.index');
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->headquarter = $request->input('headquarter');
        $brand->founded_date = $request->input('founded_date');

        if ($request->hasFile('image')) {
            $currentImg = $brand->imagee;
            if($currentImg)
            {
                Storage::delete('/public/'.$currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $brand->image = $path;
        }

        $brand->save();

        Session::flash('success', 'Sửa thông tin thành công');
        return redirect()->route('brand.index');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.delete', compact('brand'));
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('brand.index');
    }
}
