<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function getmidia(string $imagem){

            if(strpos($imagem,".png")) {
                $type = 'image/png';
            } elseif (strpos($imagem,".jpg")) {
                $type = 'image/jpg';
            } elseif (strpos($imagem,".jpeg")) {
                $type = 'image/jpeg';
            }
            if(!empty($imagem) && !empty($type)) {
                return response()->file(public_path('imagens') .
                    DIRECTORY_SEPARATOR . $imagem,['Content-Description' => 'Image File','Content-Type'=>$type]);
            }else{
                return response()->json([
                    'message' => 'Não encontrada.'
                ], 404);
            }
    }

}
