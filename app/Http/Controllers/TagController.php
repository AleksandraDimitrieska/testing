<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Technology;

class TagController extends Controller
{
    public function create()
    {
    	$technologies = Technology::all();
    	return view('Tag.create')->with('technologies', $technologies);
    }

    public function single($id)
    {
    	$tag = Tag::find($id);
    	$technologies = $tag->technologies;
    	return view('Tag.single')->with('tag', $tag)->with('technologies', $technologies);
    }

    public function save(Request $request)
    {
    	$tag = new Tag();
    	$tag->name = $request->name;

    	$tag->save();
        $tag->technologies()->sync($request->technologies, false); 

    	return redirect('/tags');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $technologies = Technology::all();
        $selectedTechIds = $tag->selectedTechIds();
        return view('Tag.edit')->with('tag', $tag)->with('technologies', $technologies)->with('selectedTechIds', $selectedTechIds);
    }
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        $tag->save();
         if(isset($request->technologies))
            {
                $tag->technologies()->sync($request->technologies);
            }
        else
            {
                $tag->technologies()->sync(array());
            }
                    return redirect('/tags');

    }

    public function index()
    {
    	$tags = Tag::all();
    	return view('Tag.index')->with('tags', $tags);
    }
}