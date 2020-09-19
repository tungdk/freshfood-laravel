<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        $articles=Article::where('status',1);
        if($request->category){
            $articles->where('menu_id',$request->category);
        }
        $articles= $articles
            ->select('id','name','slug','picture','description','created_at')
            ->orderByDesc('id')
            ->paginate(8);

        $articlesNew=Article::where('status',1)
            ->orderByDesc('id')
            ->limit(3)
            ->select('id','name','slug','picture','description','created_at')
            ->get();

        $menus=Menu::where('status',1)
            ->orderByDesc('id')
            ->select('id','name','slug','created_at')
            ->get();

        $viewData=[
            'articles'=>$articles,
            'articlesNew'=>$articlesNew,
            'menus'=>$menus,
        ];
        return view('fontend.pages.article.index',$viewData);
    }
}
