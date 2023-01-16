<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class Inventorycontrolar extends Controller
{
    public function create(){
        return view('inventory.create');
    }
    public function save(Request $request){
        $validator = Validator::make($request->toArray(), [
            'name' => 'required',
            'code' => 'required',
            'date'=>'required',
            'namber'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->all(),
                'state' => false
            ]);
        }
        $invoice=new Invoice;
        $invoice->name=$request->name;
        $invoice->code=$request->code;
        $invoice->date=$request->date;
        $invoice->namber=$request->namber;
        $invoice->company_name=$request->company_name;
        $invoice->customer_name=$request->customer_name;
        $invoice->customer_address=$request->customer_address;
        $invoice->customer_email=$request->customer_email;
        $invoice->save();
        if($invoice){
            for($i=1;$i<count($request->item_description);$i++){
                $item=Item::create([
                    'invoice_id'=>$invoice->id,
                    'name'=>$request->item_name[$i],
                    'qty'=>$request->item_qty[$i],
                    'description'=>$request->item_description[$i],
                    'price'=>$request->item_price[$i],
                    'total'=>$request->total_price[$i],
                ]);
            }
            $total=0;
            $items=Item::where('invoice_id',$invoice->id)->get();
            foreach($items as $key){
                $total+=$key->total;
            }
            Invoice::find($invoice->id)->update([
                'total'=> $total
            ]);
            return response()->json([
                'message' => 'Invoice Created successfully',
                'state' => true
            ]);
        }else{
            return response()->json([
                'message' => 'Error in Creating Invoice',
                'state' => false
            ]);
        }
    }
    public function list(){
        return view('inventory.list');
    }
    public function list2(Request $request){
        // dd($request->all());
        $Invoice = Invoice::get();
        return Datatables::of($Invoice)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $actionBtn = '<a class="Download btn btn-success btn-sm">Download pdf</a> <a  class="delete btn btn-danger btn-sm">Delete</a><a  class="edit btn btn-info btn-sm">Edit</a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);

    }
    public function deleteinvoice(Request $request){
        $Invoice = Invoice::find($request->id);
        if($Invoice){
            $items=Item::where('invoice_id',$request->id)->get();
            foreach($items as $key){
                $key->delete();
            }
            $Invoice->delete();
            return response()->json([
                'message' => 'Invoice Deleted successfully',
                'state' => true
            ]);
        }else{
            return response()->json([
                'message' => 'Error in  Delete  Invoice',
                'state' => false
            ]);
        }
    }
    public function download(Request $request){
        $Invoice = Invoice::find($request->id);
        if($Invoice){
            $items=Item::where('invoice_id',$request->id)->get();
            $pdf = Pdf::loadView('inventory.details', compact('Invoice','items'));
            $pdf->save('inventoy.pdf');
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Error while  download Invoice'
            ]);
        }
    }
    public function edit($id){
        $Invoice = Invoice::find($id);
        $i=1;
        if($Invoice){
            $items=Item::where('invoice_id',$id)->get();
            return view('inventory.edit',compact('Invoice','items','i'));
        }else{
            return back();
        }
    }
    public function update(Request $request){
        // dd($request->id);
        $validator = Validator::make($request->toArray(), [
            'name' => 'required',
            'code' => 'required',
            'date'=>'required',
            'namber'=>'required',
            'company_name'=>'required',
            'customer_name'=>'required',
            'customer_address'=>'required',
            'customer_email'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->all(),
                'state' => false
            ]);
        }
        $invoice=Invoice::find($request->Invoiceid);
        if($invoice){
            $invoice->name=$request->name;
            $invoice->code=$request->code;
            $invoice->date=$request->date;
            $invoice->namber=$request->namber;
            $invoice->company_name=$request->company_name;
            $invoice->customer_name=$request->customer_name;
            $invoice->customer_address=$request->customer_address;
            $invoice->customer_email=$request->customer_email;
            $invoice->update();
            $items=Item::where('invoice_id',$request->Invoiceid)->get();
            foreach($items as $key){
                $key->delete();
            }
            for($i=1;$i<count($request->item_description);$i++){
                $item=Item::create([
                    'invoice_id'=>$invoice->id,
                    'name'=>$request->item_name[$i],
                    'qty'=>$request->item_qty[$i],
                    'description'=>$request->item_description[$i],
                    'price'=>$request->item_price[$i],
                    'total'=>$request->total_price[$i],
                ]);
            }
            $total=0;
            $items2=Item::where('invoice_id',$invoice->id)->get();
            foreach($items2 as $key){
                $total+=$key->total;
            }
            Invoice::find($invoice->id)->update([
                'total'=> $total
            ]);
            return response()->json([
                'message' => 'Invoice updated successfully',
                'state' => true
            ]);
        }else{
            return response()->json([
                'message' => 'Invoice not found',
                'state' => false
            ]);
        }
    }
}
