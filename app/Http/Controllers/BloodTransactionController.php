<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\BloodTransaction;
use App\Models\BloodType;
use App\Models\Donor;
use App\Models\MedicalPersonnel;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BloodTransactionController extends Controller
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

        $blood_transactions = BloodTransaction::all();

        return view('admin.bloodTransaction.bloodTransaction' , compact('blood_transactions'));
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
        return view('admin.bloodTransaction.createBloodTransaction' ,
            ['medical_personnels'=>MedicalPersonnel::all('empID','firstName') ,
                'recipients'=>Recipient::all('recipientsID','firstName'),
                'blood_types'=>BloodType::all('typeID','typeName') ]);
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
            'empID' => 'required',
            'dateOut' => 'required',
            'quantity' => 'required',
            'recipientsID' => 'required',



        ]);

        $recipients = Recipient::where('recipientsID', '=', $request->recipientsID)->first();
        $bloodType = $recipients->bloodType;

        $bloodTransaction = new BloodTransaction();
        $bloodTransaction->empID = $request->empID;
        $bloodTransaction->dateOut = $request->dateOut;
        $bloodTransaction->quantity = $request->quantity;
        $bloodTransaction->recipientsID = $request->recipientsID;
        $bloodTransaction->bloodType = $bloodType;
        $bloodTransaction->save();

//        dd($donors);


        $bloodTypes = BloodType::where('typeID','=',$bloodType)->first();

        $data = [
            'typeID'=>$bloodTypes->typeID,
            'typeName'=>$bloodTypes->typeName,
            'totalQuantity'=>$bloodTypes->totalQuantity -= $request->quantity
        ];
        BloodType::where('typeID','=',$bloodType)->update($data);

        return redirect('bloodTransaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $transactID
     * @return Response
     */
    public function show(int  $transactID)
    {
        $bloodTransaction = BloodTransaction::where('transactID', '=', $transactID)->first();

        return view('admin.bloodTransaction.showBloodTransaction')->with('bloodTransaction',$bloodTransaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $transactID
     * @return Response
     */
    public function edit(int  $transactID)
    {

        $bloodTransaction = BloodTransaction::where('transactID', '=', $transactID)->first();


        return view('admin.bloodTransaction.editBloodTransaction')
            ->with('bloodTransaction' , $bloodTransaction)
            ->with('medical_personnels', MedicalPersonnel::all(['empID','firstName']))
            ->with('recipients', Recipient::all(['recipientsID','firstName']))
            ->with('blood_donations', BloodDonation::all(['bloodID']))
            ->with('blood_types',BloodType::all('typeID','typeName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $transactID
     * @return Response
     */
    public function update(Request $request,int  $transactID)
    {
        $bloodTransactionElement = BloodTransaction::where('transactID',$request->transactID) -> first();
        $previous = $bloodTransactionElement->quantity;
        $new = $request->quantity;
        if ($previous > $new){
            $value = $previous - $new;
        }else{
            $value = $new - $previous;
        }

        $request->validate([
            'empID' => 'required',
            'dateOut' => 'required',
            'quantity' => 'required',
            'recipientsID' => 'required',

        ]);
        $data= request()->except(['_token','_method']);
        $bloodTransaction = BloodTransaction::where('transactID',$request->transactID) -> update($data);

        $recipients = Recipient::where('recipientsID', '=', $request->recipientsID)->first();
        $bloodType = $recipients->bloodType;

        $bloodTypes = BloodType::where('typeID','=',$bloodType)->first();
        if ($previous > $new){
            $totalQuantity = $bloodTypes->totalQuantity += $value;
        }else{
            $totalQuantity = $bloodTypes->totalQuantity -= $value;
        }
        $data = [
            'typeID'=>$bloodTypes->typeID,
            'typeName'=>$bloodTypes->typeName,
            'totalQuantity'=>$totalQuantity,

        ];
        BloodType::where('typeID','=',$bloodType)->update($data);

        return redirect('bloodTransaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $transactID
     * @return Response
     */
    public function destroy($transactID)
    {
        $bloodTransaction = BloodTransaction::where('transactID', '=', $transactID)->first();
        $recipients = Recipient::where('recipientsID', '=', $bloodTransaction->recipientsID)->first();

        $bloodType = $recipients->bloodType;

        $bloodTypes = BloodType::where('typeID','=',$bloodType)->first();

        $data = [
            'typeID'=>$bloodTypes->typeID,
            'typeName'=>$bloodTypes->typeName,
            'totalQuantity'=>$bloodTypes->totalQuantity += $bloodTransaction->quantity
        ];
        BloodType::where('typeID','=',$bloodType)->update($data);
        BloodTransaction::where('transactID', '=', $transactID)->delete();
        return redirect()->route('bloodTransaction.index');
    }
}
