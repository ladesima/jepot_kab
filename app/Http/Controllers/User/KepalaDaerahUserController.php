<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KepalaDaerah;

class KepalaDaerahUserController extends Controller
{
    public function bupati()
    {
        $bupati = KepalaDaerah::where('jabatan', 'Bupati Jeneponto')->firstOrFail();
        return view('user.bupati', compact('bupati'));
    }

    public function wakilBupati()
    {
        $wakilBupati = KepalaDaerah::where('jabatan', 'Wakil Bupati Jeneponto')->firstOrFail();
        return view('user.wakil-bupati', compact('wakilBupati'));
    }


}
