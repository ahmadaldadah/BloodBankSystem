<?php

namespace App\Http\Controllers;

use App\Models\MedicalPersonnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalPersonnelController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $medical_personnels = MedicalPersonnel::all();

        return view('admin.medicalPersonnel.medicalPersonnel' , compact('medical_personnels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // if (Gate::denies('accessAdmin')) {
        //     return redirect('/home');
        // }
        return view('admin.medicalPersonnel.createMedicalPersonnel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        // $request->all();
        // $request->input('title');
        $request->validate([
            'firstName' => 'required|max:10',
            'lastName' => 'required|max:10',
            'phone' => 'required',
            'email' => 'required'

        ]);

        $medicalPersonnel= new MedicalPersonnel();
        $medicalPersonnel->firstName = $request->firstName;
        $medicalPersonnel->lastName = $request->lastName;
        $medicalPersonnel->address = $request->address;
        $medicalPersonnel->phone = $request->phone;
        $medicalPersonnel->dateOfBirth = $request->dateOfBirth;
        $medicalPersonnel->email = $request->email;
        $medicalPersonnel->save();
        return redirect('medicalPersonnel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $empID
     * @return Response
     */
    public function show(int  $empID)
    {
        $medicalPersonnel = MedicalPersonnel::where('empID', '=', $empID)->first();

        return view('admin.medicalPersonnel.showMedicalPersonnel')->with('medicalPersonnel',$medicalPersonnel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $empID
     * @return Response
     */
    public function edit(int  $empID)
    {

        $medicalPersonnel = MedicalPersonnel::where('empID', '=', $empID)->first();


        return view('admin.medicalPersonnel.editMedicalPersonnel')
            ->with('medicalPersonnel' , $medicalPersonnel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $empID
     * @return Response
     */
    public function update(Request $request,int  $empID)
    {
        $request->validate([
            'firstName' => 'required|max:10',
            'lastName' => 'required|max:10',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $data= request()->except(['_token','_method']);
        $medicalPersonnel = MedicalPersonnel::where('empID',$empID) -> update($data );

        return redirect('medicalPersonnel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $empID
     * @return Response
     */
    public function destroy($empID)
    {
        $medicalPersonnel = MedicalPersonnel::where('empID', '=', $empID)->delete();


        return redirect()->route('medicalPersonnel.index');
    }
}
