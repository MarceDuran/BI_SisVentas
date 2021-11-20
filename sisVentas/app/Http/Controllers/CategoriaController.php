<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Models\Categoria;

use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
     public function __construct(){

        }
        public function index(Request $request){
        if($request){
        $query=trim($request->get('searchText'));
        $categorias=DB::table('categoria')->where('Nombre','LIKE','%'.$query.'%')
        ->where('Condicion','=','1')
        ->orderBy('IdCategoria','desc')
        ->paginate(7);
        return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }

        }

        public function create(){
        return view("almacen.categoria.create");
        }

        public function store(CategoriaFormRequest $request){

        $categoria = new Categoria;
        $categoria->Nombre=$request->get('Nombre');
        $categoria->Descripcion=$request->get('Descripcion');
        $categoria->Condicion='1';
        $categoria->save();
        return Redirect::to('almacen/categoria');
        }

        public function show($Id){
        return view ("almacen.categoria.show",["categoria"=>Categoria::findOrFail($Id)]);
        }

        public function edit($Id){
         return view ("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($Id)]);
        }

        public function update(CategoriaFormRequest $request, $Id){
        $categoria =Categoria::findOrFail($Id);
        $categoria->Nombre=$request->get('Nombre');
        $categoria->Descripcion=$request->get('Descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');


        }

        public function destroy($Id){

        $categoria =Categoria::findOrFail($Id);
        $categoria->Condicion="0";
        $categoria->update();
        return Redirect::to('almacen/categoria');
        }
}
