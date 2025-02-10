<?php

namespace App\Http\Controllers;
use App\Models\Catergory;
use App\Models\SubCategory;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function index()
    {
        //
        
        $catergorys = Catergory ::paginate(8);
        $filter_catergorys = Catergory ::all();
                                                                         

        return view('web_site.web_page.home',compact('catergorys','filter_catergorys'));
    }

    
    public function show()
    {
        //
        
        
        $catergorys = Catergory ::all();
        $posts = Post::paginate(50);
        $filter_catergorys = Catergory ::all();
        $subCategorys = SubCategory ::all();
        return view('web_site.web_page.addvertismen',compact('catergorys','posts','filter_catergorys','subCategorys'));


    }

    

    public function filter(Request $request, Post $post)
    {  
        $category = $request->get('category');
        $location = $request->get('location');
        $topic = $request->get('topic');

        
        if ($category || $location || $topic) {
            $posts = Post::query();//whereHas()

            // Apply filters based on the provided input
            if ($category) {
                $posts->where('catergory_id', $category);
            }
    
            if ($location) {
                $posts->Where('location',  $location );
            }
    
            if ($topic) {
                $posts->Where('topic', $topic );
            }
    
            // Execute the query to get the filtered posts
            $posts = $posts->get();

        
        }
        else {
            return redirect()->route('view_post');
        }
        $catergorys = Catergory ::all();
        return view('addmin.post',compact('posts','catergorys'));

    }


    public function filter_web(Request $request, Post $post)
    {
        //use post filter user dashbord
        $category = $request->get('category');

        $subCategory = $request->get('subCategory');
        $location = $request->get('location');
        $topic = $request->get('topic');

       
        if ($category || $subCategory || $location || $topic) {

            $posts = Post::where('user_id', auth()->id());
            //$posts = Post::query();
            // $posts = auth()->user()->Post;

            // Apply filters based on the provided input
            
            if ($category && $subCategory) {
                // Validate if the selected subcategory belongs to the selected category
                $isValidSubCategory = SubCategory::where('id', $subCategory)
                    ->where('maincatergory_id', $category)
                    ->exists();
        
                if (!$isValidSubCategory) {
                    return response()->json(['error' => 'Invalid subcategory selected for this category.'], 400);


                    //return redirect()->back()->withErrors(['error' => 'Invalid subcategory selected for this category.' . $e->getMessage()]);
                }
        
                // Since `catergory_id` in `posts` actually stores `subCategory.id`, filter accordingly
                $posts->where('catergory_id', $subCategory);
            } elseif ($category) {
                // Get all subcategories under the selected category
                $subCategoryIds = SubCategory::where('maincatergory_id', $category)->pluck('id')->toArray();
                $posts->whereIn('catergory_id', $subCategoryIds);

                
            } elseif ($subCategory) {
                $posts->where('catergory_id', $subCategory);
            }


            if ($location) {
                $posts->Where('location',  $location );
            }
    
            if ($topic) {
                $posts->Where('topic', $topic );
            }
    
            // Execute the query to get the filtered posts
            $posts = $posts->paginate(50);

            
        }
        else {
            return redirect()->route('addvertesmen');
        }
        $catergorys = Catergory ::all();
        $subCategorys = SubCategory::all();

       /* return response()->json( [ 'posts' => $posts,
    'catergorys' => $catergorys,
    'subCategorys' => $subCategorys ]); */


        return view('web_site.web_page.addvertismen',compact('posts','catergorys','subCategorys'));
    }

    public function addvertesmen_details(Request $request,$id)
    {

        $post = Post::find($id);
        $catergorys = Catergory ::all();
        $subCategorys = SubCategory::all();
        return view('web_site.web_page.addvertisment_details',compact('post','catergorys','subCategorys'));
    }

}
