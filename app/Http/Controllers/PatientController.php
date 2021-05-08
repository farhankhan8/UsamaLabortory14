<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\AvailableTest;
use App\TestPerformed;
use Session;
use App\Catagory;
use App\Patient;
use App\PatientCategory;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $patients  = Patient::all();
        return view('admin.patient.index', compact('patients'));
    }
    public function create()
    {
        $patientCategorys = PatientCategory::all()->pluck('Pcategory', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.patient.create',compact('patientCategorys'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'Pname' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric',
            ]);
        $room = Patient::create($request->all());
        return redirect()->route('patient-list');
    }
    public function edit($id)
    { 
        abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $patients = Patient::findOrFail($id);
        $patientCategorys = PatientCategory::all()->pluck('Pcategory', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.patient.edit', compact('patients','patientCategorys'));
    }
    public function update($id, Request $request)
{
    $patient = Patient::findOrFail($id);
    $input = $request->all(); 
    $patient->fill($input)->save();
    Session::flash('flash_message', 'Task successfully added!');
    return redirect()->route('patient-list');
}
    public function show($id)
    { 
        $allTests = DB::table('test_performeds')
        ->where('test_performeds.patient_id', $id)
        ->join('available_tests', 'test_performeds.available_test_id', '=', 'available_tests.id')
        ->select('available_tests.name','test_performeds.testResult','available_tests.initialNormalValue'
        ,'available_tests.finalNormalValue','test_performeds.start_time')
        ->orderBy('patient_id', 'DESC')
        ->get();
        // dd($test);
         $tests = $allTests->pluck('name');    
          $patient = Patient::findOrFail($id);
        //   $patients  = Patient::all();
        //  $a
        //  $getTestPerformed = AvailableTest::all()->pluck('name');
        //  $getTestFee = AvailableTest::all()->pluck('testFee');
        //  $getTestUnits = AvailableTest::all()->pluck('units');
        //   dd($getTestPerformed);
        return view('admin.patient.show', compact('patient','tests','allTests'));
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        Session::flash('flash_message', 'Task successfully deleted!');
        return redirect()->route('patient-list');
    }
    public function patientCategory()
    {
        abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $patientCategorys  = PatientCategory::all();
        return view('admin.patient.pcindex', compact('patientCategorys'));
    }
    public function pccreate()
    {
        return view('admin.patient.pccreate');
    }
    public function pcstore(Request $request)
    {
        $this->validate($request,[
            'Pcategory' => 'required|max:120',
            'discount' => 'required',
            ]);
        $room = PatientCategory::create($request->all());
        return redirect()->route('patient-category');
    }
    public function pcshow($id)
    { 
        $patientCategory = PatientCategory::findOrFail($id);
        // dd($patientCategory);
        return view('admin.patient.pcshow', compact('patientCategory'));
    }
    public function pcedit($id)
    {
        abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $patientCategory = PatientCategory::findOrFail($id);
        return view('admin.patient.pcedit', compact('patientCategory'));
    }
    public function pcupdate($id, Request $request)
    {
        $patientCategory = PatientCategory::findOrFail($id);
        $input = $request->all(); 
        $patientCategory->fill($input)->save();
        Session::flash('flash_message', 'Task successfully added!');
        return redirect()->route('patient-category');
    }
    public function pcdestroy($id)
    {
        $patientCategory = PatientCategory::findOrFail($id);
        $patientCategory->delete();
        Session::flash('flash_message', 'Task successfully deleted!');
        return redirect()->route('patient-category');
    }
}
