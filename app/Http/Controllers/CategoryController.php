<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CategoryController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.all_categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate POST

        $request->validate([
            'category_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'desc' => 'required|string',
            'image_thumb' => 'nullable|image',
        ]);

        $category = new Category([
            'user_id' => auth()->user()->id,
            'category_title' => $request->category_title,
            'meta_desc' => $request->meta_desc,
            'keywords' => $request->keywords,
            'desc' => $request->desc,
        ]);

        try {
            $category->save();

            return redirect()->route('all_categories')->with('success', 'Category Created Successfully.');
        } catch (Exception) {
            return redirect()->back()->with('fail', 'Category not Saved, check and try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            return view('categories.show_category', compact('category'));
        } else {
            return redirect()->back()->with('fail', 'Category not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // validate CATEGORY

        $request->validate([
            'category_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'desc' => 'required|string',
            'image_thumb' => 'nullable|image',
        ]);

        try {
            $category->update([
                'category_title' => $request->category_title,
                'meta_desc' => $request->meta_desc,
                'keywords' => $request->keywords,
                'desc' => $request->desc,
            ]);

            return redirect()->route('all_categories')->with('success', 'Category Updated Successfully.');
        } catch (Exception) {
            return redirect()->back()->with('fail', 'Category not Updated, check and try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('all_categories')->with('success', 'Category Deleted Successfully');
    }
}
