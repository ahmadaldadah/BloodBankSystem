<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\BloodTransaction;
use App\Models\BloodType;
use App\Models\Donor;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BloodDonationController extends Controller
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
        $blood_donations = BloodDonation::all();
        return view('admin.bloodDonation.bloodDonation' , compact('blood_donations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.bloodDonation.createBloodDonation',['donors'=>Donor::all('donorID','firstName')]);
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
            'donorID' => 'required',
            'dateDonated' => 'required',
            'quantity' => 'required'
        ]);

        $bloodDonation = new BloodDonation();
        $bloodDonation->donorID = $request->donorID;
        $bloodDonation->dateDonated = $request->dateDonated;
        $bloodDonation->quantity = $request->quantity;
        $bloodDonation->save();
        $donors = Donor::where('donorID', '=', $request->donorID)->first();
        $bloodType = $donors->bloodType;
        $bloodTypes = BloodType::where('typeID','=',$bloodType)->first();
        $data = [
            'typeID'=>$bloodTypes->typeID,
            'typeName'=>$bloodTypes->typeName,
            'totalQuantity'=>$bloodTypes->totalQuantity += $request->quantity
        ];
        BloodType::where('typeID','=',$bloodType)->update($data);
        return redirect('bloodDonation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $bloodID
     * @return Response
     */
    public function show(int  $bloodID)
    {
        $bloodDonation = BloodDonation::where('bloodID', '=', $bloodID)->first();

        return view('admin.bloodDonation.showBloodDonation')->with('bloodDonation',$bloodDonation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $bloodID
     * @return Response
     */
    public function edit(int  $bloodID)
    {

        $bloodDonation = BloodDonation::where('bloodID', '=', $bloodID)->first();


        return view('admin.bloodDonation.editBloodDonation')
            ->with('bloodDonation' , $bloodDonation)
            ->with('donors',Donor::all(['donorID','firstName']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $bloodID
     * @return Response
     */
    public function update(Request $request,int  $bloodID)
    {

        $bloodDonationElement= BloodDonation::where('bloodID',$bloodID) -> first();
        $previous = $bloodDonationElement->quantity;
        $new = $request->quantity;
        if ($previous > $new){
            $value = $previous - $new;
        }else{
            $value = $new - $previous;
        }
        $request->validate([
            'donorID' => 'required',
            'dateDonated' => 'required',
            'quantity' => 'required',
        ]);
        $data= request()->except(['_token','_method']);
        $bloodDonation= BloodDonation::where('bloodID',$bloodID) -> update($data);
        $donor = Donor::where('donorID', '=', $request->donorID)->first();
        $bloodType = $donor->bloodType;

        $bloodTypes = BloodType::where('typeID','=',$bloodType)->first();
        if ($previous > $new){
            $totalQuantity = $bloodTypes->totalQuantity -= $value;
        }else{
            $totalQuantity = $bloodTypes->totalQuantity += $value;
        }
        $data = [
            'typeID'=>$bloodTypes->typeID,
            'typeName'=>$bloodTypes->typeName,
            'totalQuantity'=>$totalQuantity,
        ];
        BloodType::where('typeID','=',$bloodType)->update($data);
        return redirect('bloodDonation');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $bloodID
     * @return Response
     */
    public function destroy($bloodID)
    {
        $bloodDonation = BloodDonation::where('bloodID', '=', $bloodID)->first();
        $donor = Donor::where('donorID', '=', $bloodDonation->donorID)->first();
        $bloodType = $donor->bloodType;
        $bloodTypes = BloodType::where('typeID','=',$bloodType)->first();
        $data = [
            'typeID'=>$bloodTypes->typeID,
            'typeName'=>$bloodTypes->typeName,
            'totalQuantity'=>$bloodTypes->totalQuantity -= $bloodDonation->quantity
        ];
        BloodType::where('typeID','=',$bloodType)->update($data);
        BloodDonation::where('bloodID', '=', $bloodID)->delete();
        return redirect()->route('bloodDonation.index');
    }
}
