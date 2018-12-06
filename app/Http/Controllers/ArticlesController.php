<?php

namespace App\Http\Controllers;
use App\Article;
use Request, Validator;

class ArticlesController extends Controller
{
    public function index()
    {
    	// $articles = Article::orderby('created_at', 'desc')->get();
    	$articles = Article::latest()->get();
    	// return $articles;
      $category = [0 => 'Tips', 1 => 'Technology', 2 => 'Health', 3 => 'Politics', 4 => 'Review'];
    	return view('articles.index')->with('category', $category)->with(compact('articles'));
    }

    public function tags($category)
    {
      $category2 = ['Tips' => 0, 'Technology' => 1, 'Health' => 2, 'Politics' => 3, 'Review' => 4];
      $category3 = [0 => 'Tips', 1 => 'Technology', 2 => 'Health', 3 => 'Politics', 4 => 'Review'];
      $articles = Article::where('category', $category2[$category])->get();;
      return view('articles.index')->with('category', $category3 )->with(compact('articles'));
      
    }
    public function show($id)
    {
    	$articles = Article::findorfail($id);
    	return view('articles.show', compact('articles'));
    	
    }
    public function create()

    {
    	return view('articles.create');
    }

    public function store()
    {
    	$inputs = Request::all();
      $rules = [
        'title' => 'required|min:3',
        'body' => 'required',
      ];
      $err_msg = [
        'title.required' => 'Article must have a title',
        'title.min' => 'Article Title must be atleast 3 characters.',
        'body.required' => 'Aritlce body is required.',
      ];
      $validator = Validator::make(Request::all(), $rules, $err_msg);

      if($validator->fails()){

        return redirect()->back()
          ->withInput(Request::all())
          ->withErrors($validator);
      }
    	Article::create($inputs);
    	return redirect('blogs');
    }

    public function edit($id)
    {
      $rules = [
        'title' => 'required|min:3',
        'body' => 'required',
      ];
      $err_msg = [
        'title.required' => 'Article must have a title',
        'title.min' => 'Article Title must be atleast 3 characters.',
        'body.required' => 'Aritlce body is required.',
      ];
      $validator = Validator::make(Request::all(), $rules, $err_msg);
       $err_msg = [
        'title.required' => 'Article must have a title',
        'title.min' => 'Article Title must be atleast 3 characters.',
        'body.required' => 'Aritlce body is required.',
      ];
      $validator = Validator::make(Request::all(), $rules, $err_msg);

      if($validator->fails()){

        return redirect()->back()
          ->withInput(Request::all())
          ->withErrors($validator);
      }
       $articles = Article::find($id);
       $articles->fill(Request::all());
       $articles->save();

       // $article->title = $inputs['title'];
       // $article->body = $inputs['body'];
       // $article->save();

       return redirect('blogs');
    }
}
