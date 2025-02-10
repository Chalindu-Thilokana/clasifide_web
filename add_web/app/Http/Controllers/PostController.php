<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Catergory;
use App\Models\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post ::all();
        //$posts = Post::with('subCategory.category')->get(); 
       // $posts = Post::with('subCategory.catergory')->get();
        $catergorys = Catergory ::all();
        $subCategorys = SubCategory ::all();

        //dd('posts');
        //dd($posts, $catergorys);

        return view('addmin.post',compact('posts','catergorys','subCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //

        $posts = auth()->user()->Post;

        //$posts = Post ::all();
        $catergorys = Catergory ::all();
        $subCategorys = SubCategory::all();
        return view('user.post_user',compact('posts','catergorys','subCategorys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post,$id)
    {
        //
        $post = Post::find($id);
        $catergorys = Catergory ::all();
        return view('user.post_update',compact('catergorys','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post,$id)
    {
        //
        $validatedData = $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string|max:36',
            'location' => 'required|string|max:255',
            'phone' => 'required|regex:/\d{10}/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048 ',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048 ',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $currentRecord = Post::find($id);
        $imagePath = $currentRecord->image ?? null;
        $imagePath2 = $currentRecord->image2 ?? null;
        $imagePath3 = $currentRecord->image3 ?? null;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

      // $imagePath2 = null;
        if ($request->hasFile('image2')) {
           $image2 = $request->file('image2');
             // $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
           $imagePath2 = $image2->store('images', 'public');
           }

        //  $imagePath3 = null;
        if ($request->hasFile('image3')) {
           $image3 = $request->file('image3');
            // $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
            $imagePath3 = $image3->store('images', 'public');
        }
        $post = Post::find($id);
        $user = Auth::user();
        $user_Id = Auth::id();

        if ($post && $post->user_id == $user->id) {
            // If it belongs to the user, delete the post
           // $post->delete();

           $post->update( [
            'topic' => $validatedData['topic'],
            'description' => $validatedData['description'],
            'phone' => $validatedData['phone'],
            'image' => $imagePath,
            'image2' => $imagePath2, // Store image path
            'image3' => $imagePath3, // Store image path
            'location' => $validatedData['location'],
            'catergory_id' => $validatedData['category'],
            'price' => $validatedData['price'],
            'user_id' => $user_Id,
            
        ]);
         
        return redirect()->route('user_view_post');
              }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post,$id)
    {
        //add min delete function
       
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    
    public function delete(Post $post,$id)
    {
        //add min delete function
        $user = Auth::user();
        $post = Post::find($id);
        if ($post && $post->user_id == $user->id) {
            // If it belongs to the user, delete the post
           // $post->delete();
         $post->delete();
        return redirect()->back();
              }
    }

    public function filter(Request $request, Post $post)
    {
        //
        $category = $request->get('category');
        $subCategory = $request->get('subCategory');
        $location = $request->get('location');
        $topic = $request->get('topic');

        //$posts = Post::query();

        // If subcategory is provided, retrieve the parent category ID
     

        
        if ($category || $subCategory|| $location || $topic) {
            $posts = Post::query();//whereHas()
           
            // Apply filters based on the provided input
            
            if ($category && $subCategory) {
                // Validate if the selected subcategory belongs to the selected category
                $isValidSubCategory = SubCategory::where('id', $subCategory)
                    ->where('maincatergory_id', $category)
                    ->exists();
        
                if (!$isValidSubCategory) {
                    return response()->json(['error' => 'Invalid subcategory selected for this category.'], 400);
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
            $posts = $posts->get();
        

        
        }
        else {
            return redirect()->route('view_post');
        }
        $catergorys = Catergory ::all();
        $subCategorys = SubCategory::all();
        return view('addmin.post',compact('posts','catergorys','subCategorys'));
    }


    public function filter_user(Request $request, Post $post,$e)
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


                   // return redirect()->back()->withErrors(['error' => 'Invalid subcategory selected for this category.' . $e->getMessage()]);
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
            $posts = $posts->get();

             
        }
        else {
            return redirect()->route('user_view_post');
        }
        $catergorys = Catergory ::all();
        $subCategorys = SubCategory::all();

       /* return response()->json( [ 'posts' => $posts,
    'catergorys' => $catergorys,
    'subCategorys' => $subCategorys ]); */


        return view('user.post_user',compact('posts','catergorys','subCategorys'));
    }
 



}
