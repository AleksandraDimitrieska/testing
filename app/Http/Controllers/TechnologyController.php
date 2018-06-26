<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technology;
use App\Tag;

class TechnologyController extends Controller
{
    public function index()
    {
    	$technologies = Technology::all();
    	return view('Technology.index')->with('technologies', $technologies);
    }

    public function single($id)
    {
    	$technology = Technology::find($id);
    	$questions = $technology->questions;
        $tags = $technology->tags;
    	return view('Technology.single')->with('technology', $technology)->with('questions', $questions)->with('tags', $tags);
    }

    public function create()
    {
        $tags = Tag::all();
    	return view('Technology.create')->with('tags', $tags);
    }
    
    public function save(Request $request)
    {
    	$technology = new Technology();
    	$technology->name = $request->name;
    	$technology->save();
        $technology->tags()->sync($request->tags, false);

    	return redirect('/');
    }

    public function edit($id)
    {
    	$technology = Technology::find($id);
        $tagsId = $technology->showIds();
        $tags = Tag::all();
    	return view('Technology.edit')->with('technology', $technology)->with('tags', $tags)->with('tagsId', $tagsId);
    }

    public function update(Request $request, $id)
    {
    	$technology = Technology::find($id);
    	$technology->name = $request->input('name');
    	$technology->save();
        if(isset($request->tags))
            {
                $technology->tags()->sync($request->tags);
            }
        else
            {
                $technology->tags()->sync(array());
            }


    	return redirect('/');
    }

    public function search($id)
    {
        //$technology = Technology::where('name', $request->value);
        
        $technology = Technology::find($id);

        return response($technology, 200)
                  ->header('Content-Type', 'application/json');
    }
}
