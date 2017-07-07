<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Tone;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function store(Request $request) {

        $comment = new Comment();
        if($comment) {

            $comment->sku_id = $request->sku_id;
            $comment->user_id = $request->user_id;
            $comment->body = $request->body;
            $comment->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $comment->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            // save comment
            $comment->save();

            // tutaj musisz wywolac watsona
            // $watson = new Watson();
            // $watson = passBodyToAnalyse($request->body);
            // $watsonJson = $watson->getJsonResult();

            // tutaj bedziesz mial tez moj analizator
            // $analyse = new Analyse();
            // $analyseResult = $analyse->analyseJson($watsonJason); // positive or negative


            // $tone = new Tone();
            // if($tone) {
            //      $tone->json = $watsonJson;
            //      $tone->result = $analyseResult;
            //      $tone->save();
            // }

            return response()->json('Comment created',201);
        } else {
            return response()->json('Forbidden Problem with creating comment',403);
        }
    }


    public function index() {
        // Display list of skus with attached comments
        $comments = Comment::all();


        $data = array();
        $i = 0;
        foreach($comments as $comment) {
            $data[$i] = $comment;
            if( count($comment->tone) > 0 ) {
                $data[$i]['tone'] = $comment->tone;
            }
            $i++;
        }

        return response()->json([
            'comments' => $data
        ],200);


    }
}
