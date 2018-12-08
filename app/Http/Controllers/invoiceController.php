<?php

namespace App\Http\Controllers;

use App\invoice;
use App\invoice_line_item;
use Illuminate\Http\Request;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=invoice::orderBy('id','DESC')->simplePaginate(10);
        return view('admin.invoices.index',compact('invoices'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice=invoice::find($id);
        $invoice_line_items=invoice_line_item::where('invoice_id',$id)->get();
        return view('admin.invoices.show',compact('invoice','invoice_line_items'));
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
        $invoice=invoice::find($id);
        $invoice->status=$request->toggle_option;
        $invoice->arrival_date=$request->arrival_date;
        $invoice->save();
        return redirect('/roza-admin/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        invoice::find($id)->delete();
//        $articles=DB::table('articles')->get();
        return back();
    }

    public function type($type)
    {
            $invoices = invoice::where('status', 'LIKE', $type)->simplePaginate(10);
            return view('admin.invoices.index', compact('invoices'));

    }
}

