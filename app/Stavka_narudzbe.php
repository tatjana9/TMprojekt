<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stavka_narudzbe extends Model
{
    protected $table = 'stavka_narudzbe';
    public $fillable = ['Naziv_stavke_cjenika','Cijena', 'Opis', 'Kolicina'];
}
