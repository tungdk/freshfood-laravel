<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestArticle;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class AdminArticleController extends Controller
{
    //
    public function index()
    {
        $articles=Article::with('menu:id,name,slug')->paginate(15);
        $viewData=[
            'articles'=>$articles,
        ];
        return view('admin.article.index',$viewData);
    }

    public function create()
    {
        $menus=Menu::all();

        return view('admin.article.create',compact('menus'));
    }
    public function store(AdminRequestArticle $request)
    {
        $data=$request->except('_token','picture');
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = Carbon::now();

        if ($request->hasFile('picture')) {
            //get file from input
            $image = $request->file('picture');
            //get file name - ham time() trong php de get ra time vi du 9822828
            $name = time().'-'.$image->getClientOriginalName();
            //path - duong dan store
            $destinationPath = public_path('/uploads/brand');
            //chuyen file tạm thành file chính
            $image->move($destinationPath, $name);
            $data['picture'] = $name;
        }
        $id=Article::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $menus=Menu::all();
        return view('admin.article.update',compact('article','menus'));
    }

    public function update(AdminRequestArticle $request , $id)
    {
        $article = Article::findOrFail($id);
        $data               =$request->except('_token','picture');
        $data['slug']       = Str::slug($request->name);
        $data['updated_at'] = Carbon::now();
        if ($request->hasFile('picture')) {
            //get file from input
            $image = $request->file('picture');
            //get file name - ham time() trong php de get ra time vi du 9822828
            $name = time().'-'.$image->getClientOriginalName();
            //path - duong dan store
            $destinationPath = public_path('/uploads/brand');
            //chuyen file tạm thành file chính
            $image->move($destinationPath, $name);
            $data['picture'] = $name;
        }
        $article->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $article=Article::find($id);
        if($article) $article->delete();
        return redirect()->back();
    }

    public function active($id)
    {
        $article=Article::find($id);
        $article->status=!$article->status;
        $article->save();
        return redirect()->back();
    }

    public function hot($id)
    {
        $article=Article::find($id);
        $article->hot=!$article->hot;
        $article->save();
        return redirect()->back();
    }
}
