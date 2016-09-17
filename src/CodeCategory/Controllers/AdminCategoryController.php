<?php

namespace CodePress\CodeCategory\Controllers;
use CodePress\CodeCategory\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    private $category;

   public function __construct(Category $category)
   {
       $this->category = $category;
   }
    
    public function index(){
        $categories=Category::all();
        return view("codecategory::index",compact('categories'));
    }
    
    public function create(){
    $categories = Category::orderBy('name')->lists('name', 'id');
    $categories = count($categories) > 0 ? $categories->toArray() : array();
    $categories=array_merge(array('-None-'),$categories);
    return view('codecategory::create',compact('categories'));
   }
   
   public function store(Request $request){
       $this->category->create($request->all());
       return redirect()->route('admin.categories.index');
   }

    
}
