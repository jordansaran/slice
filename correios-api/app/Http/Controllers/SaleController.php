<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use DateTime;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sales::all();
        return response()->json($sales);
    }

    public function store(Request $request)
    {
        $sale = new Sales;
        $sale->order = $request->order;
        $sale->buyer_document = $request->buyer_document;
        $sale->delivery_date = $request->delivery_date;
        $sale->price = $request->price;
        $sale->product_id = $request->product_id;
        $sale->amount = $request->amount;
        $sale->observation = $request->observation;
        $sale->save();
        return response()->json([
            "message" => "Sale Added."
        ], 200);
    }

    public function show($id)
    {
        $sale = Sales::find($id);
        if (empty($sale)) return response()->json([
            "message" => "Sale not found"
        ], 404);
        return response()->json($sale);
    }

    public function update(Request $request, $id)
    {
        if (Sales::where('id', $id)->exists())
        {
            $sale = Sales::find($id);
            $sale->buyer_document = is_null($request->buyer_document) ? $sale->buyer_document : $request->buyer_document;
            $sale->delivery_date = is_null($request->delivery_date) ? $sale->delivery_date : $request->delivery_date;
            $sale->price = is_null($request->price) ? $sale->price : $request->price;
            $sale->product_id = is_null($request->product_id) ? $sale->product_id : $request->product_id;
            $sale->amount = is_null($request->amount) ? $sale->amount : $request->amount;
            $sale->observation = is_null($request->observation) ? $sale->observation : $request->observation;
            $sale->save();
            return response()->json([
                "message" => "Sale updated."
            ], 201);
        }
        return response()->json([
            "message" => "Sale not found"
        ], 404);
    }

    public function destroy($id)
    {
        if (Sales::where('id', $id)->exists())
        {
            $sale = Sales::find($id);
            $sale->delete();

            return response()->json([
                "message" => "Sale updated."
            ], 204);
        }
        return response()->json([
            "message" => "Sale not found"
        ], 404);
    }

    public function upload(Request $request)
    {
        $file = $request->file('excel');
        $row = 1;
        if($file)
        {
            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if($row > 1) {
                        $sale = new Sales;
                        $sale->order = $data[0];
                        $sale->buyer_document = $data[1];
                        $sale->delivery_date = DateTime::createFromFormat('d/m/y', $data[2]);
                        $sale->sale_date = DateTime::createFromFormat('d/m/y', $data[3]);
                        $sale->price = (float)preg_replace('/[^\d.]/', '', $data[4]);
                        $sale->product_id = intval($data[5]);
                        $sale->amount = intval($data[6]);
                        $sale->observation = $data[7];
                        $sale->save();
                    }
                    $row++;
                }
            }
        }
        return response()->json([
            "message" => "File not uplod"
        ], 404);
    }

}
