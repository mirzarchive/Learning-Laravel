<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuitarFormRequest;
use App\Models\Guitar;
use Illuminate\Http\Request;

class GuitarsController extends Controller
{
    private function getData()
    {
        return [
            ['id' => 1, 'name' => 'American Standard Strat', 'brand' => 'Fender'],
            ['id' => 2, 'name' => 'Starla S3', 'brand' => 'PRS'],
            ['id' => 3, 'name' => 'Explorer', 'brand' => 'Gibson'],
            ['id' => 4, 'name' => 'Talman', 'brand' => 'Fender']
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET
        return view('guitars.index', [
            'guitars' => Guitar::all(),
            'userInput' => strip_tags('<script>alert("hello")</script>')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET
        return view('guitars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuitarFormRequest $request)
    {
        // POST
        $data = $request->validated();

        // Guitar::create([
        //     'name' => $request['name'],
        //     'brand' => $request['brand'],
        //     'year_made' => $request['year']
        // ]);
        // // or directly use incoming request data
        // // but all field must the same as table column name

        $guitar = new Guitar();

        $guitar->name = $data['name'];
        $guitar->brand = $data['brand'];
        $guitar->year_made = $data['year'];

        $guitar = new Guitar([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'year_made' => $request->input('year')
        ]);

        $guitar->save();

        return redirect()->route('guitars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guitar $guitar)
    // $guitar here and below are actually id passed by the client
    // then searched by the Server directly, continue if not fail
    {
        // GET
        return view('guitars.show', ['guitar' => $guitar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guitar $guitar)
    {
        // GET
        return view('guitars.edit', ['guitar' => $guitar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuitarFormRequest $request, Guitar $guitar)
    {
        // POST, PUT, PATCH (depends on what kind of UPDATE user performing)
        $data = $request->validated();

        $guitar->update([
            'name' => $data['name'],
            'brand' => $data['brand'],
            'year_made' => $data['year']
        ]);

        // $guitar->name = $data['name'];
        // $guitar->brand = $data['brand'];
        // $guitar->year_made = $data['year'];

        // $guitar->save();

        return redirect()->route('guitars.show', ['guitar' => $guitar->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($guitar)
    {
        Guitar::destroy($guitar);
        // or use $guitar->delete() if the parameter is an Guitar object

        return redirect()->route('guitars.index');
    }
}
