<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecipientController extends Controller
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

        $recipients = Recipient::all();

        return view('admin.recipient.recipient' , compact('recipients'));
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
        return view('admin.recipient.createRecipient',['blood_types'=>BloodType::all('typeID','typeName')]);
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
            'firstName' => 'required|max:10',
            'lastName' => 'required|max:10',
            'identityNumber' => 'required',
            'phone' => 'required',
            'bloodType' => 'required|max:3'


        ]);

        $recipient = new Recipient();
        $recipient->firstName = $request->firstName;
        $recipient->lastName = $request->lastName;
        $recipient->identityNumber = $request->identityNumber;
        $recipient->address = $request->address;
        $recipient->phone = $request->phone;
        $recipient->dateofbirth = $request->dateOfBirth;
        $recipient->bloodType = $request->bloodType;
        $recipient->save();
        return redirect('recipient');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $recipientsID
     * @return Response
     */
    public function show(int  $recipientsID)
    {
        $recipient = Recipient::where('recipientsID', '=', $recipientsID)->first();

        return view('admin.recipient.showRecipient')->with('recipient',$recipient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $recipientsID
     * @return Response
     */
    public function edit(int  $recipientsID)
    {

        $recipient = Recipient::where('recipientsID', '=', $recipientsID)->first();


        return view('admin.recipient.editRecipient')
            ->with('recipient' , $recipient)
            ->with('blood_types',BloodType::all('typeID','typeName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $recipientsID
     * @return Response
     */
    public function update(Request $request,int  $recipientsID)
    {
        $request->validate([
            'firstName' => 'required|max:10',
            'lastName' => 'required|max:10',
            'bloodType' => 'required|max:3',
            'phone' => 'required',
            'identityNumber' => 'required',

        ]);
        $data= request()->except(['_token','_method']);
        $recipient = Recipient::where('recipientsID',$recipientsID) -> update($data );

        return redirect('recipient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $recipientsID
     * @return Response
     */
    public function destroy($recipientsID)
    {
        $recipient = Recipient::where('recipientsID', '=', $recipientsID)->delete();


        return redirect()->route('recipient.index');
    }
}
