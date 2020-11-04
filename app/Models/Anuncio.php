<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Anuncio extends Model
{
    public function getAllAnuncios(){
        $anuncios = DB::table('anuncios as T1')
            ->select('T1.*', 'T2.nome_arquivo', 'T2.pasta')
            ->leftjoin('anuncio_fotos as T2', 'T2.id', '=', DB::raw("(SELECT MIN(T2.id) FROM anuncio_fotos as T2 WHERE T2.anuncio_id = T1.id)"))
            ->get();
        return $anuncios;
    }


    public function getAllFotos(){
        $anuncios = DB::table('anuncio_fotos')->get();
        return $anuncios;
    }

    public function getAnunciosUsuario($idUsuario){
        $anuncio = DB::table('anuncios as T1')
            ->select('T1.*')
            ->where('T1.usuarios_id', '=', $idUsuario)
            ->get();
        return $anuncio;
    }


    public function getAnuncio($id){
        $anuncio = DB::table('anuncios as T1')
            ->select('T1.*')
            ->where('T1.id', '=', $id)
            ->first();
        $fotos = DB::table('anuncio_fotos as T1')
            ->select('T1.nome_arquivo', 'T1.pasta')
            ->where('T1.anuncio_id', '=', $id)
            ->get();
        $anuncio->fotos = $fotos;
        return $anuncio;
    }

    public function getAnunciosFiltros($arrayFiltros){
        $query = DB::table('anuncios as T1')
        ->select('T1.id', 'T1.nome', 'T1.telefone', 'T2.nome_arquivo', 'T2.pasta')
        ->leftjoin('anuncio_fotos as T2', 'T2.id', '=', DB::raw("(SELECT MIN(T2.id) FROM anuncio_fotos as T2 WHERE T2.anuncio_id = T1.id)"));

        foreach($arrayFiltros as $key => $filtro){
            if(is_int($filtro)) 
                $query->where($key, '=', $filtro);
            else if(is_array($filtro)){
                $query->where(function($squery) use ($key, $filtro){
                    foreach($filtro as $subFiltro){
                        if(empty($squery))
                            $squery->where($key, '=', $subFiltro);
                        else
                            $squery->orWhere($key, '=', $subFiltro);
                    }
                });
            }
        }
        $anuncios = $query->get();

        //echo (Str::replaceArray('?', $query->getBindings(), $query->toSql()));
        return $anuncios;
    }

    public function getAnunciosCidades(){
        $anuncios = DB::table('anuncios')->get();
        return $anuncios;
    }

    public function insereAnuncios($anuncios){
        DB::table('anuncios')->insertOrIgnore($anuncios);
    }

    public function insereFotos($fotos){
        DB::table('anuncio_fotos')->insertOrIgnore($fotos);
    }

    use HasFactory;
}
