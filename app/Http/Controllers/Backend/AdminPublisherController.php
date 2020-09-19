<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestPublisher;
use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPublisherController extends Controller
{
    //
    public function index()
    {
        $publishers=Publisher::paginate(15);
        $viewData=[
            'publishers'=>$publishers,
        ];
        return view('admin.publisher.index',$viewData);
    }
    public function create()
    {
        return view('admin.publisher.create');
    }
    public function store(AdminRequestPublisher $request)
    {
        $data=$request->except('_token');
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = Carbon::now();

        $id=Publisher::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $publisher=Publisher::find($id);
        return view('admin.publisher.update',compact('publisher'));
    }

    public function update(AdminRequestPublisher $request , $id)
    {
        $publisher = Publisher::find($id);
        $data               =$request->except('_token');
        $data['slug']       = Str::slug($request->name);
        $data['updated_at'] = Carbon::now();
      
        $publisher->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $publisher=Publisher::find($id);
        if($publisher) $publisher->delete();
        return redirect()->back();
    }
}
