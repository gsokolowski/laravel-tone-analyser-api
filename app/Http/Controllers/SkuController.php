<?php

namespace App\Http\Controllers;

use App\Sku;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SkuController extends Controller
{
    public function index() {

        // Display list of skus with attached comments
        $skus = Sku::all();

        $data = array();
        $i = 0;
        foreach($skus as $sku) {
            $data[$i] = $sku;
            if( count($sku->comments) > 0 ) {
                $data[$i]['comments'] = $sku->comments;
            }
            $i++;
        }

        return response()->json([
            'skus' => $data
        ],200);
    }



    public function store(Request $request) {

        $sku = new Sku();
        if($sku) {

            $sku->code = $request->code;
            $sku->name = $request->name;
            $sku->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $sku->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            $sku->save();

            return response()->json('Sku created',201);
        } else {
            return response()->json('Forbidden Problem with creating sku',403);
        }

//        $reply = Sku::create([
//            'code' => $request->code,
//            'name' => $request->name,
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
//
//        if($reply) {
//            return response()->json('Sku created',201);
//        } else {
//            return response()->json('Forbidden Problem with creating sku',403);
//        }

    }



}
