<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class AnuncioController extends Controller
{
    public function index(){
        $anuncioModel = new Anuncio();
        $anuncios = $anuncioModel->getAllAnuncios();
        return view('anuncios', ['anuncios' => $anuncios]);
    }

    public function getAnuncio($id){
        $anuncioModel = new Anuncio();
        $anuncio = $anuncioModel->getAnuncio($id);
        foreach($anuncio as $key => $value){
            if(is_numeric($value) && !in_array($key, ["idade", "peso", "altura"])){
                $tmp = $this->mapaOpcoes($key, $value);
                if(!is_null($tmp) && !empty($tmp)){
                    $anuncio->$key = $tmp;
                }else{
                    $anuncio->$key = $value ? "sim" : "não";
                }
            }
        }
        return view('anuncio', ['anuncio' => $anuncio]);
    }

    public function pesquisa(Request $request){
        //dd($request->all());
        $arrayFiltros = [];
        foreach($request->all() as $key => $values){
            if(preg_match('/[^a-zA-Z_]/', $key)){
                return redirect('/');
            }
            if(is_array($values)){
                $tmp = [];
                foreach($values as $value){
                    if(preg_match('/[^a-zA-Z_]/', $value)){
                        return redirect('/');
                    }
                    $result = $this->mapaOpcoes($key, $value);
                    if(!is_null($result))
                        $tmp[] = $result;
                }
                $arrayFiltros[$key] = $tmp;
            }elseif($values == "true"){
                $arrayFiltros[$key] = 1;
            }
        }
        $anuncioModel = new Anuncio();
        $anuncios = $anuncioModel->getAnunciosFiltros($arrayFiltros);
        return view('anuncios', ['anuncios' => $anuncios]);        
    }


    function mapaOpcoes($campo, $valor){
        $cabelo_cor = [
            0 => "loira",
            1 => "morena",
            2 => "ruiva"
        ];
        $cabelo_tamanho = [
            0 => "curto",
            1 => "medio",
            2 => "longo"
        ];
        $tipo_corporal = [
            0 => "magra",
            1 => "musculosa",
            2 => "gordinha",
            3 => "normal"
        ];
        $seios_tamanho = [
            0 => "pequenos",
            1 => "medios",
            2 => "grandes"
        ];
        $depilacao_tipo = [
            0 => "depilada", 
            1 => "aparada", 
            2 => "natural", 
            3 => "peluda"
        ];
        $cor_pele_etnia = [
            0 => "branca", 
            1 => "negra", 
            2 => "mulata", 
            3 => "indígena", 
            4 => "asiática"
        ];

        if(isset($$campo) &&is_numeric($valor) && isset($$campo[$valor]))
            return $$campo[$valor];
        elseif(isset($$campo)){
            $campo = array_flip($$campo);
            if(isset($campo[$valor]))
                return $campo[$valor];
            else
                return null;
        }else{
            return null;
        }
    }












    //IMPORTA REGISTROS NA TABELA ANUNCIOS, PARA TESTE
    public function importaJSON(){
        $json = file_get_contents('C:\\xampp\\htdocs\\scrapping_eurogirlsescort\\json_escorts.json');
        $json = str_replace(':"','"',$json);
        $arrAnuncios = json_decode($json, true);

        $anuncios = [];
        foreach($arrAnuncios as $dadosAnuncio){
            //$insert["id"] = $dadosAnuncio[""];
            $insert["usuarios_id"] = rand (1,3);
            $insert["nome"] = $dadosAnuncio["nome"];
            $insert["telefone"] = $this->arrumaFone($dadosAnuncio["telefone"]);
            $insert["endereco"] = $dadosAnuncio["Nationality"];
            
            $insert["descricao"] = isset($dadosAnuncio["descricao"]) ? $dadosAnuncio["descricao"] : null;
            //$insert["descricao"] = "I am beautiful, sexy, stylish, sophisticated and very friendly - a PERFECT COMPANION for you !.Please, note- I am local, I dont have any problems!!! I am not a travel girl, who are coming to Helsinki for a short time and ready for everything for money.";
            
            $tmp = $dadosAnuncio["Location"];
            $tmp = explode('/', $tmp);
            $insert["bairro"] = $tmp[0];
            $insert["cidade"] = $tmp[1];
            //$insert["uf"] = $dadosAnuncio[""];
            $insert["idade"] = $dadosAnuncio["Age"];
            $tmp = $dadosAnuncio["Height"];
            $tmp = explode(' ', $tmp);
            $insert["altura"] = $tmp[0];
            $tmp = $dadosAnuncio["Weight"];
            $tmp = explode(' ', $tmp);
            $insert["peso"] = $tmp[0];
            $insert["tipo_corporal"] = rand (0,3);
            $insert["cabelo_cor"] = rand (0,2);
            $insert["cabelo_tamanho"] = rand (0,2);
            $insert["seios_tamanho"] = rand (0,2);
            $insert["silicone"] = rand (0,1);
            $insert["depilacao_tipo"] = rand (0,2);
            $insert["cor_pele_etnia"] = rand (0,3);
            $insert["fala_ingles"] = rand (0,1);
            $insert["fala_espanhol"] = rand (0,1);
            $insert["fala_frances"] = rand (0,1);
            $insert["fala_italiano"] = rand (0,1);
            $insert["fala_alemao"] = rand (0,1);
            $insert["posicao_69"] = rand (0,1);
            $insert["sexo_anal"] = rand (0,1);
            $insert["vende_fotos"] = rand (0,1);
            $insert["vende_videos"] = rand (0,1);
            $insert["video_chamada"] = rand (0,1);
            $insert["ejaculacao_rosto"] = rand (0,1);
            $insert["ejaculacao_corpo"] = rand (0,1);
            $insert["oral_completo"] = rand (0,1);
            $insert["garganta_profunda"] = rand (0,1);
            $insert["dirty_talk"] = rand (0,1);
            $insert["atende_dupla"] = rand (0,1);
            $insert["massagem_erotica"] = rand (0,1);
            $insert["massagem_relaxante"] = rand (0,1);
            $insert["beija_na_boca"] = rand (0,1);
            $insert["estilo_namorada"] = rand (0,1);
            $insert["golden_shower_give"] = rand (0,1);
            $insert["golden_shower_receive"] = rand (0,1);
            $insert["sexo_em_grupo"] = rand (0,1);
            $insert["oral_sem_camisinha"] = rand (0,1);
            $insert["beijo_grego_ativo"] = rand (0,1);
            $insert["beijo_grego_passivo"] = rand (0,1);
            $insert["role_play"] = rand (0,1);
            $insert["espanhola"] = rand (0,1);
            $insert["brinquedos"] = rand (0,1);
            $insert["squirting"] = rand (0,1);
            $insert["striptease"] = rand (0,1);
            $insert["roupas_fantasias"] = rand (0,1);
            $insert["atende_dois_homens"] = rand (0,1);
            $insert["atende_casal"] = rand (0,1);
            $insert["atende_mulher"] = rand (0,1);
            $insert["dupla_penetracao"] = rand (0,1);
            $insert["possui_local"] = rand (0,1);
            $insert["local_do_cliente"] = rand (0,1);
            $insert["motel"] = rand (0,1);
            //$insert["subida_anuncio"] = $dadosAnuncio[""];
            //$insert["created_at"] = $dadosAnuncio[""];
            //$insert["updated_at"] = $dadosAnuncio[""];
            $anuncios[] = $insert;
        }
        $anuncioModel = new Anuncio();
        $anuncioModel->insereAnuncios($anuncios);
        $this->importaFotos($arrAnuncios);
    }

    //IMPORTA REGISTROS NA TABELA FOTOS, PARA TESTE
    public function importaFotos($arrAnuncios){
        $fotos = [];
        foreach($arrAnuncios as $key => $dadosAnuncio){
            $insert = [];
            foreach($dadosAnuncio["imagens"] as $img){
                if(strlen($img)<200){
                    $insert["anuncio_id"] = $key+1;
                    $insert["foto_destaque"] = ($key == 1 ? 1 : 0);
                    $tmp = explode("/", $img);
                    $insert["nome_arquivo"] = $tmp[count($tmp)-2]."_".$tmp[count($tmp)-1];
                    $insert["pasta"] = "fotos/";
                    $insert["extensao"] = "jpg";
                    $fotos[] = $insert;
                }
            }
        }
        $anuncioModel = new Anuncio();
        $anuncioModel->insereFotos($fotos);
    }

    public function arrumaFone($string){
        $string = preg_replace('/\D/', '', $string);
        return substr($string, 0, 11);
    }
}
