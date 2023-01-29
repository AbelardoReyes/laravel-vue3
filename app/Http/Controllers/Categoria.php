<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Models\Categoria as CategoriaModel;
use App\Models\Calzado as CalzadoModel;
use Illuminate\Http\Request;

use function Termwind\render;

class Categoria extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $rutas = [
            'index' => route('categoria.index'),
            'indexCalzado' => route('calzado.index'),
        ];
        return Inertia::render('Zapateria/Categoria/CategoriaIndex', [
            'categorias' => CategoriaModel::all()->map(function ($categoria) {
                return [
                    'id' => $categoria->id,
                    'nombre' => $categoria->nombre,
                    'descripcion' => $categoria->descripcion,
                    'index' => route('categoria.index'),
                    'indexCalzado' => route('calzado.index'),
                    'viewDelete' => route('categoria.vistaEliminar', ['id' => $categoria->id]),
                    'viewEdit' => route('categoria.vistaEditar', ['id' => $categoria->id]),
                    'viewCalzado' => route('categoria.formularioCalzado', ['id' => $categoria->id]),
                ];
            }), 'rutas' => $rutas
        ]);
    }
    public function formulario()
    {
        return Inertia::render('Zapateria/Categoria/CategoriaCreate');
    }
    public function crearCategoria(Request $request)
    {

        $Validator = Validator::make($request->all(), [
            'nombre' => ['required', 'max:20'],
            'descripcion' => ['required', 'max:50'],
        ], [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.max' => 'El campo nombre no puede tener mas de 20 caracteres',
            'descripcion.required' => 'El campo descripcion es requerido',
            'descripcion.max' => 'El campo descripcion no puede tener mas de 50 caracteres',
        ]);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator->errors());
        }
        $categoria = new CategoriaModel();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
    }
    public function editarCategoria(Request $reques)
    {
        $Validator = Validator::make($reques->all(), [
            'nombre' => ['required', 'max:20'],
            'descripcion' => ['required', 'max:50'],
        ], [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.max' => 'El campo nombre no puede tener mas de 20 caracteres',
            'descripcion.required' => 'El campo descripcion es requerido',
            'descripcion.max' => 'El campo descripcion no puede tener mas de 50 caracteres',
        ]);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator->errors());
        }
        $categoria = CategoriaModel::find($reques->id);
        $categoria->nombre = $reques->nombre;
        $categoria->descripcion = $reques->descripcion;
        $categoria->save();
        return redirect()->route('categoria.index');
    }
    public function vistaEditar(Request $request)
    {
        $categoriaFind = CategoriaModel::find($request->id);
        $categoria = [
            'id' => $categoriaFind->id,
            'nombre' => $categoriaFind->nombre,
            'descripcion' => $categoriaFind->descripcion,
            'edit' => route('categoria.editarCategoria', ['id' => $categoriaFind->id]),
        ];
        $rutas = [
            'index' => route('categoria.index'),
        ];
        return Inertia::render('Zapateria/Categoria/CategoriaEdit', [
            'rutas' => $rutas, 'categoria' => $categoria
        ]);
    }
    public function eliminarCategoria(Request $request)
    {
        $categoria = CategoriaModel::find($request->id);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
    public function vistaEliminar(Request $request)
    {
        $categoria = CategoriaModel::find($request->id);
        $find = [
            $categoria->id,
            $categoria->nombre,
            $categoria->descripcion,
            'index' => route('categoria.index'),
            'delete' => route('categoria.eliminarCategoria', ['id' => $categoria->id]),
        ];
        return Inertia::render('Zapateria/Categoria/CategoriaDelete', [
            'categoria' => $find
        ]);
    }
    public function formularioCalzado(Request $reques)
    {
        $categoria = CategoriaModel::find($reques->id);
        $rutas = [
            'index' => route('categoria.index'),
            'create' => route('categoria.crearCalzado'),
        ];
        return Inertia::render('Zapateria/Categoria/CategoriaFormularioCalzado', [
            'rutas' => $rutas, 'categoria' => $categoria
        ]);
    }
    public function crearCalzado(Request $request)
    {
        $calzado = new CalzadoModel();
        $calzado->marca = $request->marca;
        $calzado->modelo = $request->modelo;
        $calzado->color = $request->color;
        $calzado->existencia = $request->existencia;
        $calzado->precio = $request->precio;
        $calzado->categoria = $request->categoriaId;
        $calzado->save();
        return redirect()->route('categoria.index');
    }
}
