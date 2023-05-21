<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {
        /*
        $request->validate([
        'title' => 'required|max:100',
        'description' => 'nullable|min:10|max:2000',
        'thumb' => 'required|url|max:255',
        'price' => 'required|numeric',
        'series' => 'required|max:100',
        'sale_date' => 'required',
        'type' => 'required|max:30',
        ]);
        $form_data = $request->all();
        */

        $form_data = $request->validated();
        // dd($form_data);
        // die();

        $newComic = new Comic();

        /*
        ALTERNATIVA
        $newComic->title = $form_data["title"];
        $newComic->descrisption = $form_data["description"];
        $newComic->thumb = $form_data["thumb"];
        $newComic->price = str_replace("$", "", $form_data['price']);
        $newComic->series = $form_data["series"];
        $newComic->sale_date = $form_data["sale_date"];
        $newComic->type = $form_data["type"];
         */

        $newComic->fill($form_data);
        $newComic->save();
        return redirect()->route('comics.show', ['comic' => $newComic->id])->with('status', 'Fumetto aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        /**
         * ALTERNATIVA
         *
         * $comic = Comic::findOrFail($id);
         */

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(StoreComicRequest $request, Comic $comic)
    {
        /*
        $request->validate([
        'title' => 'required|max:100',
        'description' => 'nullable|min:10|max:2000',
        'thumb' => 'required|url|max:255',
        'price' => 'required|numeric',
        'series' => 'required|max:100',
        'sale_date' => 'required',
        'type' => 'required|max:30',
        ]);
        $form_data = $request->all();
         */

        $form_data = $request->validated();
        $comic->update($form_data);
        // return redirect()->route('comics.show', ['comic' => $comic->id]);
        return to_route('comics.show', ['comic' => $comic->id])->with('status', 'Fumetto aggiornato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        // return redirect()->route('home');
        return to_route('comics.index')->with('deleteStatus', "$comic->title è stato canellato dalla tua lista!");
    }
}
