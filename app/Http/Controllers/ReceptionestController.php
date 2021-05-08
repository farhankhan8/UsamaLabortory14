<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\AvailableTest;
use App\TestPerformed;
use Session;
use DB;
use App\Catagory;

use App\Services\EventService;
use App\Patient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ReceptionestController extends Controller
{
    


   




    public function index()
    {
        // abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events  = Patient::all();

        return view('receptionest.patient.index', compact('events'));
    }
    public function create()
    {
        // dd("Fadfa");
        // abort_if(Gate::denies('room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $rooms = Catagory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        return view('receptionest.patient.create',compact('rooms'));
    }
 


    public function store(Request $request)
    {
        $this->validate($request,[
            'Pname' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric',
            ]);
        $room = Patient::create($request->all());

        return redirect()->route('receptionest.home');


    }
    public function edit($id)
    {
        // abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $room = Patient::findOrFail($id);
        return view('receptionest.patient.edit', compact('room'));
    }
    
    public function update($id, Request $request)
{
    $task = Patient::findOrFail($id);



    $input = $request->all();

    $task->fill($input)->save();

    Session::flash('flash_message', 'Task successfully added!');

    return redirect()->route('receptionest.home');
}

    public function show($id)
    {
        $test = DB::table('test_performeds')
        ->where('test_performeds.patient_id', $id)
        ->join('available_tests', 'test_performeds.available_test_id', '=', 'available_tests.id')
        ->select('available_tests.name')
        ->orderBy('patient_id', 'DESC')
        ->get();
         $tests = $test->pluck('name');    
          $patient = Patient::findOrFail($id);
        //  $a
        //  $getTestPerformed = AvailableTest::all()->pluck('name');
        //  $getTestFee = AvailableTest::all()->pluck('testFee');
        //  $getTestUnits = AvailableTest::all()->pluck('units');
        //   dd($getTestPerformed);
        return view('receptionest.patient.show', compact('patient','tests'));




        // $patients = Patient::findOrFail($id);
        // $getNameAndFee = $patients->availableTest->pluck('name','testFee');
        // return view('receptionest.patient.show', compact('patients','getNameAndFee'));
    }

    public function destroy($id)
    {
        $task = Patient::findOrFail($id);
    
        $task->delete();
    
        Session::flash('flash_message', 'Task successfully deleted!');
    
        return redirect()->route('receptionest.home');
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}


