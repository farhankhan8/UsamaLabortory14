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
class AvailableTestController extends Controller
{
    public function index()
    { 
         abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $availableTests = AvailableTest::all();
        return view('admin.availableTests.index', compact('availableTests'));
    }
    public function create()
    {
        abort_if(Gate::denies('room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categoryNames = Catagory::all()->pluck('Cname', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.availableTests.create',compact('categoryNames'));
    }
    public function store(Request $request)
    {
        $room = AvailableTest::create($request->all());
        return redirect()->route('available-tests');
    }   
    public function edit($id)
    {
        abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $availableTest = AvailableTest::findOrFail($id);
        $catagorys = Catagory::all()->pluck('Cname', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.availableTests.edit', compact('availableTest','catagorys'));
    }
    public function update($id, Request $request)
   {
    $task = AvailableTest::findOrFail($id);
    $input = $request->all();
    $task->fill($input)->save();
    // Session::flash('flash_message', 'Task successfully added!');
    return redirect()->route('available-tests');
}
    public function show($id)
    {
        $availableTestId = AvailableTest::findOrFail($id);
        return view('admin.availableTests.show', compact('availableTestId'));
    }
    public function destroy($id)
    {
        $task = AvailableTest::findOrFail($id);
        $task->delete();
        // Session::flash('flash_message', 'Task successfully deleted!');
        return redirect()->route('available-tests');
    }
}
