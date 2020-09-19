<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleDetailController extends Controller
{
    //
    public function index(Request $request,$slug)
    {
        $arraySlug=explode('-',$slug);
        $id=array_pop($arraySlug);

        if($id){
            $article=Article::find($id);

            $articlesNew=Article::where('status',1)
            ->orderByDesc('id')
            ->limit(3)
            ->select('id','name','slug','picture','description','created_at','content')
            ->get();

            $viewData=[
                'article'=>$article,
                'articlesNew'=>$articlesNew,
                // 'productSuggests'=>$this->getProductSuggests($product->category_id)
            ];
            return view('fontend.pages.article_detail.index',$viewData);
        }
        return redirect()->to('/');
    }
}
