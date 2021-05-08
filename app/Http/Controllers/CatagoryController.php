<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\AvailableTest;
use App\TestPerformed;
use Session;
use App\Catagory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CatagoryController extends Controller
{
    public function index()
    {
         abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categoryes   = Catagory::all();
        return view('admin.catagory.index', compact('categoryes'));
    }
    public function create()
    {
         abort_if(Gate::denies('room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //  $rooms = Catagory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.catagory.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        Catagory::create($input);
        return redirect()->route('catagory-list');
    }
    public function edit($id)
    {
        abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $catagory = Catagory::findOrFail($id);
        return view('admin.catagory.edit', compact('catagory'));
    }
    public function update($id, Request $request)
{
    $catagoryId = Catagory::findOrFail($id);
    $input = $request->all();
    $catagoryId->fill($input)->save();
    return redirect()->route('catagory-list');
}
    public function show($id)
    {
        $catagoryId = Catagory::findOrFail($id);
        $testInThisCategory = $catagoryId->availableTest->pluck('name');
        return view('admin.catagory.show', compact('catagoryId','testInThisCategory'));
    }
    public function destroy($id)
    {
        $catagoryId = Catagory::findOrFail($id);
        $catagoryId->delete();
        // Session::flash('flash_message', 'Task successfully deleted!');
        return redirect()->route('catagory-list');
    }
}
