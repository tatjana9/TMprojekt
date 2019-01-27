<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stavka_narudzbe;
use App\stavke_cjenika;

class KosaricaController extends Controller
{
      public function index()
    {
      $cjeniks = stavke_cjenika::all();
      return view('kosarica.stavke',compact('cjeniks'));

    }
 
    public function cart()
    {
        return view('kosarica.kosarica');
    }
    
    
    public function addToCart($id)
    {
      $stavka = stavke_cjenika::find($id);
      $stavka_narudzbe = new Stavka_narudzbe();
      $stavka_narudzbe->Naziv_stavke_cjenika = $stavka->Naziv_stavke_cjenika;
      $stavka_narudzbe->Cijena  = $stavka->Cijena;
      $stavka_narudzbe->Opis  = $stavka->Opis;
      $stavka_narudzbe->Kolicina=1;
      $stavka_narudzbe->save();
 
        if(!$stavka) {
 
            abort(404);
 
        }
 
        $kosarica = session()->get('kosarica');
 
        // if cart is empty then this the first product
        if(!$kosarica) {
 
            $kosarica = [
                    $id => [
                        "naziv_stavke_cjenika" => $stavka_narudzbe->Naziv_stavke_cjenika,
                        "cijena" => $stavka_narudzbe->Cijena,
                        "opis" => $stavka_narudzbe->Opis,
                        "kolicina" => '1',
                    ]
            ];
 
            session()->put('kosarica', $kosarica);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($kosarica[$id])) {
 
            $kosarica[$id]['kolicina']++;
 
            session()->put('kosarica', $kosarica);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $kosarica[$id] = [
            "naziv_stavke_cjenika" => $stavka_narudzbe->Naziv_stavke_cjenika,
             "cijena" => $stavka_narudzbe->Cijena,
            "opis" => $stavka_narudzbe->Opis,
             "kolicina" => 1,
        ];
 
        session()->put('kosarica', $kosarica);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    
    public function update(Request $request)
    {
        if($request->id and $request->kolicina)
        {
            $kosarica = session()->get('kosarica');
 
            $kosarica[$request->id]["kolicina"] = $request->kolicina;
 
            session()->put('kolicina', $kolicina);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $kosarica = session()->get('kosarica');
 
            if(isset($kosarica[$request->id])) {
 
                unset($kosarica[$request->id]);
 
                session()->put('kosarica', $kosarica);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }
}
