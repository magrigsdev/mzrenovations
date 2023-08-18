<?php

namespace App\Http\Controllers;

use App\Models\Commentaires;
use Illuminate\Http\Request;

class CommentairesController extends Controller
{
    //
    public function getData()
    {
        $commentaires = Commentaires::all();

        return response()->json([
            "status"=>1
        ]);
    }
}
