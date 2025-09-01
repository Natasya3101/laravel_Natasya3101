<?php
namespace App\Http\Controllers;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller {
    public function index() {
        $hospitals = Hospital::orderBy('id','desc')->paginate(10);
        return view('hospitals.index', compact('hospitals'));
    }

    public function create(){ return view('hospitals.create'); }
    public function store(Request $r){
        $r->validate(['name'=>'required']);
        Hospital::create($r->only('name','address','email','phone'));
        return redirect()->route('hospitals.index')->with('success','Hospital added');
    }
    public function edit(Hospital $hospital){ return view('hospitals.edit', compact('hospital')); }
    public function update(Request $r, Hospital $hospital){
        $hospital->update($r->only('name','address','email','phone'));
        return redirect()->route('hospitals.index')->with('success','Hospital updated');
    }
    public function destroy(Hospital $hospital){
        $hospital->delete();
        return redirect()->route('hospitals.index')->with('success','Hospital deleted');
    }

    // AJAX delete
    public function ajaxDestroy(Hospital $hospital){
        $hospital->delete();
        return response()->json(['status'=>'ok']);
    }
}
