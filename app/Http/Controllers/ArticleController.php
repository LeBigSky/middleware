<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(User $user)
     {
     
   
          $this->middleware(['webmaster'])->except(['index', 'show']);  
     
     }
    public function index()
    {
        $articles= Article::all();
        return view('article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $user= User::find(Auth::id());
        $store= new Article();
        $store->titre = $request->titre;
        $store->texte = $request->texte;
        $store->user_id = $user->id;
        $store->save();
        return redirect('article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $user= User::find(Auth::id());
        if($user->role_id == 4 ){
            if($article->user_id == 4){
                 $article->titre = $request->titre;
                $article->texte = $request->texte;
                $article->user_id = $user->id;
                $article->save();
            }
        }
            elseif ($user->role_id == 1 ||$user->role_id == 3 ){
            $article->titre = $request->titre;
            $article->texte = $request->texte;
            $article->user_id = $user->id;
            $article->save();
            }
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $user= User::find(Auth::id());
    
        if($user->role_id == 4 ){
               if($article->user_id == 4)
        $article->delete();
        }
        elseif ($user->role_id == 1 ||$user->role_id == 3 )
        {
 $article->delete();
        }
         
        return redirect()->route('article.index');
    }
}
