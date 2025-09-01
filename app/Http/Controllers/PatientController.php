<?php
namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;

class PatientController extends Controller {
    public function index(Request $r){
        $hospitals = Hospital::orderBy('name')->get();
        $query = Patient::with('hospital');
        if($r->has('hospital_id') && $r->hospital_id){
            $query->where('hospital_id', $r->hospital_id);
        }
        $patients = $query->orderBy('id','desc')->paginate(10);
        return view('patients.index', compact('patients','hospitals'));
    }

    public function create(){
        $hospitals = Hospital::orderBy('name')->get();
        return view('patients.create', compact('hospitals'));
    }
    public function store(Request $r){
        $r->validate(['name'=>'required','hospital_id'=>'required']);
        Patient::create($r->only('name','address','phone','hospital_id'));
        return redirect()->route('patients.index')->with('success','Patient added');
    }
    public function edit(Patient $patient){
        $hospitals = Hospital::orderBy('name')->get();
        return view('patients.edit', compact('patient','hospitals'));
    }
    public function update(Request $r, Patient $patient){
        $patient->update($r->only('name','address','phone','hospital_id'));
        return redirect()->route('patients.index')->with('success','Patient updated');
    }
    public function destroy(Patient $patient){
        $patient->delete();
        return redirect()->route('patients.index')->with('success','Patient deleted');
    }

    public function ajaxDestroy(Patient $patient){
        $patient->delete();
        return response()->json(['status'=>'ok']);
    }

    // AJAX filter endpoint (returns JSON list)
    public function byHospital(Hospital $hospital){
        $patients = $hospital->patients()->select('id','name','phone')->get();
        return response()->json($patients);
    }
}
