<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;              //for validation purposes
use App\Models\Category;
use Illuminate\Support\Str;
use Storage;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::orderBy('id')->latest()->paginate(10);
        return view('backend.category.index', compact('categories'))->with('i', (request()->input('page', 1) -1) * 5);;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $image = $request->file('image')->store('public/category');
       
        Category::create([

        'name'=> $name = $request->name,
        'image'=> $image,
        'slug'=>Str::slug($name)
        ]);

        return redirect()->route('category.index')->with('message', 'category created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/category');
            $category->update(['name'=>$request->name,'image'=>$image, ]);

        }
            $category->update(['name'=>$request->name]);

            return redirect()->route('category.index')->with('message', 'category updated successfully');;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (Storage::delete($category->image)) {

            $category->delete();
            // code...
        }

        return back()->with('message', 'category deleted successfully');


        

    }
}
