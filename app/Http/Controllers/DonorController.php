<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
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

        $donors = Donor::all();

        return view('admin.donor.donor' , compact('donors'));
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
        return view('admin.donor.createDonor',['blood_types'=>BloodType::all('typeID','typeName')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'firstName' => 'required|max:10',
            'lastName' => 'required|max:10',
            'phone' => 'required',
            'bloodType' => 'required|max:3'


        ]);

        $user = new User();
        $user->email=$request->email;
        $user->password= Hash::make($request['password']);
        $user->name = $request->firstName." ".$request->lastName;
        $user->save();

        $donor = new Donor();
        $donor->user_id  = $user->id;
        $donor->firstName = $request->firstName;
        $donor->lastName = $request->lastName;
        $donor->address = $request->address;
        $donor->phone = $request->phone;
        $donor->dateOfBirth = $request->dateOfBirth;
        $donor->bloodType = $request->bloodType;
        $donor->save();
        return redirect('donor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $donorID
     * @return Response
     */
    public function show(int  $donorID)
    {
        $donor = Donor::where('donorID', '=', $donorID)->first();

        return view('admin.donor.showDonor')->with('donor',$donor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $donorID
     * @return Response
     */
    public function edit(int  $donorID)
    {

        $donor = Donor::where('donorID', '=', $donorID)->first();


        return view('admin.donor.editDonor')
            ->with('donor' , $donor)
            ->with('blood_types',BloodType::all('typeID','typeName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $donorID
     * @return Response
     */
    public function update(Request $request, $donorID)
    {
        $request->validate([
            'firstName' => 'required|max:10',
            'lastName' => 'required|max:10',
            'bloodType' => 'required|max:3',
            'phone' => 'required',
        ]);
        $data= request()->except(['_token','_method']);
        $donor = Donor::where('donorID',$donorID) -> update($data );

        return redirect('donor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $donorID
     * @return Response
     */
    public function destroy($donorID)
    {
        $donor = Donor::where('donorID', '=', $donorID);
        $donorFirst = $donor->first();
        $user = User::where('id','=',$donorFirst->user_id);
        $donor->delete();
        $user->delete();

        return redirect()->route('donor.index');
    }
}
