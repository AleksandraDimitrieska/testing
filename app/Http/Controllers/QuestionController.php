<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function isPublished($id)
    {
    	//dd("fff");
    	$question = Question::find($id);
    	$question->isPublished = false;
    	$question->save();

    	        return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');

    }
}
