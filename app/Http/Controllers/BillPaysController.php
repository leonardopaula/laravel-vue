<?php

namespace App\Http\Controllers;

use Validator;
use App\BillPay;
use Illuminate\Http\Request;

use App\Http\Requests;

class BillPaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BillPay::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:1',
            'value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } 

        $billPay = BillPay::create($request->all());

        return response()->json($billPay, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BillPay $bill_pay)
    {
        return $bill_pay;
    }

    /**
     * Update the specified resource in storange
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillPay $bill_pay)
    {
        $bill_pay->fill($request->all());
        $bill_pay->save();
        return response()->json($bill_pay);
    }

    /**
     * Remove the specified resource from storage
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destro(BillPay $bill_pay)
    {
        $bill_pay->delete();
        return response()->json([], 204);
    }
}
