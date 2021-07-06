<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\BloodType;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class SampleChart extends BaseChart
{

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $types = BloodType::all();
        $type_name = [];
        $totalQuantity = [];
        foreach ($types as $type){
            array_push($type_name,$type->typeName);
            array_push($totalQuantity,$type->totalQuantity);
        }
        return Chartisan::build()
            ->labels($type_name)
            ->dataset('TotalQuantity', $totalQuantity)
            ->dataset('Minimum Quantity', [50,50, 50, 50,50, 50, 50,50]);
    }
}
