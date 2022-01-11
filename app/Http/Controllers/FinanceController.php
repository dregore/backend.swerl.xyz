<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller {
    // show all finance records
    public function showAll()
    {
        return response()->json(Finance::all());
    }

    // show ane finance records
    public function showOne($id)
    {
        return response()->json(Finance::where('user_id', $id)->firstOrFail());
    }

    // create finance record for the first time
    public function create(Request $request){
        $finance = Finance::create($request->all());

        return response()->json($finance, 201);
    }

    // update finance record
    public function update($id, Request $request){
        $finance = Finance::where('user_id', $id)->firstOrFail();
        
        if($request->has('total_topup')){
            $finance->increment('total_topup', $request->input('total_topup'));
        }

        if($request->has('total_spent')){
            $finance->increment('total_spent', $request->input('total_spent'));
        }
        return response()->json($finance, 200);

        /*
        $finance = Finance::where('user_id', $id)->firstOrFail();
        $finance->update($request->all());

        return response()->json($finance, 200);
        */
        // return response()->json($request->all(), 200);
        // return $request->input('total_topup');
    }
}