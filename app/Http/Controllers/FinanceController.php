<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller {
    // create finance record for the first time
    public function create(Request $request){
        $finance = Finance::create($request->all());

        return response()->json($finance, 201);
    }

    // update finance record
    public function update($id, Request $request){
        $finance = Finance::where('user_id', $id)->firstOrFail();
        $finance->update($request->all());

        return response()->json($finance, 200);
    }
}