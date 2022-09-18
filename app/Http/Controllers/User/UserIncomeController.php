<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Income;

class UserIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomepage = Income::where('user_id', Auth::guard('user')->user()->id )->get();
        return view('user.income.income', compact('incomepage'));
    }

    public function poststore($id)
    {
        $id = $id; 
        return view('user.income.addincome', compact('id' ));
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
        $income->admin_id = 0 ;
        $income->user_id = Auth::guard('user')->user()->id;
        $income->post_id = $request->post_id;
        $income->save();

        return redirect()->route('user_income_view')->with('success', 'Income added successfully');
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
        $income->admin_id = 0 ;
        $income->user_id = Auth::guard('user')->user()->id;
        $income->save();

        return redirect()->route('user_income_view')->with('success', 'Income added successfully');
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
        $income->admin_id = 0;
        $income->user_id = Auth::guard('user')->user()->id ;
        $income->update();

        return redirect()->route('user_income_view')->with('success', 'Income Updated successfully');; 
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
