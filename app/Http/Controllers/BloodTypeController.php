<?php

namespace App\Http\Controllers;


use App\Models\BloodType;
use Illuminate\Http\Response;

class BloodTypeController extends Controller
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
        $blood_types=BloodType::all();
        return view('home' , compact('blood_types'));
    }


}
