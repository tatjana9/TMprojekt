<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\stavke_cjenika;
class CjenikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cjeniks = stavke_cjenika::orderBy('id','DESC')->paginate(5);
        return view('cjenik.index',compact('cjeniks'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cjenik.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Naziv_stavke_cjenika' => 'required',
            'Cijena' => 'required',
            'Opis' => 'required',
        ]);
        stavke_cjenika::create($request->all());
        return redirect()->route('cjenik.index')
                        ->with('success','Stavke cjenika dodane');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $cjenik = stavke_cjenika::find($id);
        return view('cjenik.show',compact('cjenik'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $cjenik = stavke_cjenika::find($id);
        return view('cjenik.edit',compact('cjenik'));
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
        $this->validate($request, [
            'Naziv_stavke_cjenika' => 'required',
            'Cijena' => 'required',
            'Opis' => 'required',
        ]);
        stavke_cjenika::find($id)->update($request->all());
        return redirect()->route('cjenik.index')
                        ->with('success','Stavke uspjesno azurirane');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        stavke_cjenika::find($id)->delete();
        return redirect()->route('cjenik.index')
                        ->with('success','Stavke uspjesno obrisane');
    }
}