<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use Auth;

class AdminIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomepage = Income::get();
     
        return view('admin.income.income', compact('incomepage'));
    }

    public function poststore($id)
    {
        $id = $id; 
        return view('admin.income.addincome', compact('id' ));
    }
    public function ppoststore(Request $request)
    {
        $income = new Income();
        $request->validate([
            'amount' => 'required|integer',
            'currency' => 'required|string'
        ]);

        $income->amount = $request->amount;
        $income->currency = $request->currency;
        $income->admin_id = Auth::guard('admin')->user()->id ;
        $income->user_id = 0;
        $income->post_id = $request->post_id;
        $income->save();

        return redirect()->route('ad_income_view')->with('success', 'Income added successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $income = new Income();
        $request->validate([
            'amount' => 'required|integer',
            'currency' => 'required|string',
            'post_id' => 'required|integer',
        ]);

        $income->amount = $request->amount;
        $income->currency = $request->currency;
        $income->post_id = $request->post_id;
        $income->admin_id = Auth::guard('admin')->user()->id ;
        $income->user_id = 0;
        $income->save();

        return redirect()->route('ad_income_view')->with('success', 'Income added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $income = Income::where('id', $id)->first();
        $request->validate([
            'amount' => 'required|integer',
            'currency' => 'required|string',
            'post_id' => 'required|integer',
        ]);

        $income->amount = $request->amount;
        $income->currency = $request->currency;
        $income->post_id = $request->post_id;
        $income->admin_id = Auth::guard('admin')->user()->id ;
        $income->user_id = 0;
        $income->update();

        return redirect()->route('ad_income_view')->with('success', 'Income Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
