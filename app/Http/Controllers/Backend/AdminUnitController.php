<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestUnit;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminUnitController extends Controller
{
    //
    public function index()
    {
        $units=Unit::paginate(15);
        $viewData=[
            'units'=>$units,
        ];
        return view('admin.unit.index',$viewData);
    }
    public function create()
    {
        return view('admin.unit.create');
    }
    public function store(AdminRequestUnit $request)
    {
        $data=$request->except('_token');
        $data['created_at'] = Carbon::now();

        $id=Unit::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $unit=Unit::find($id);
        return view('admin.unit.update',compact('unit'));
    }

    public function update(AdminRequestUnit $request , $id)
    {
        $unit = Unit::find($id);
        $data               =$request->except('_token');
        $data['updated_at'] = Carbon::now();

        $unit->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $unit=Unit::find($id);
        if($unit) $unit->delete();
        return redirect()->back();
    }

}
