<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Quote;
use Illuminate\Support\Facades\Session;


class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quoteData=Quote::orderBy('id','desc')->paginate(6);
        return view('Quotes.index',compact('quoteData'));
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
        $this->validate($request,[
           'name'=>'required|max:60',
           'quote'=>'required|max:600',
        ]);
        Quote::create($request->all());
    //      $input=$request->all();
    //      //$author->author();
    //    // $author=Author::create($request);
    // //    $photo=Photo::create(['file'=>$name]);
    // //     $input['photo_id']=$photo->id;

    //    //$author=$request->author('name');
    //    $authorName=Author::create(['name'=>$author]);

    //    $input['author_id']=$authorName->id;
    //     $author->create($input);
    Session::flash('quoteData','A new Quote is added in the box');
    return redirect ('/quoteCreate');
        //echo "value entered sucessfully";


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quoteData=Quote::orderBy('id','desc')->where('name',$id)->paginate(6);
         return view('Quotes.index',compact('quoteData'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$id->delete();
         $quoteData=Quote::findOrFail($id);
        $quoteData->delete();
       Session::flash('deleteQuote','You Deleted the one quote');
        return redirect ('/quoteCreate');
    }
}
