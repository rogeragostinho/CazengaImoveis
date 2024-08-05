<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Imovel;

class UserController extends Controller
{
    //
    public function imoveis(){
        return view('users.imoveis.index');
    }
    
    public function show(string $id)
    {
        $imovel = Imovel::where('id', $id)->first();
        if ($imovel == null) {
            return redirect()->back()->with('erro', 'Imóvel inexistente');
        }
        return view('public.users.imoveis.show', compact('imovel'));
    }

    public function links() {
        return view('public.users.links');
    }
}
