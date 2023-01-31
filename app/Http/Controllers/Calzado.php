<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\Calzado as CalzadoModel;
use App\Models\Categoria as CategoriaModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Calzado extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request)
    {
        if ($request->filtro != null) {
            $calzadoAuctualizar = CalzadoModel::join('categorias', 'calzados.categoria', '=', 'categorias.id')->select('calzados.*', 'categorias.id as categoriaID', 'categorias.nombre')->where('calzados.categoria', $request->filtro)->get();
        } else {
            $calzadoAuctualizar = CalzadoModel::join('categorias', 'calzados.categoria', '=', 'categorias.id')->select('calzados.*', 'categorias.id as categoriaID', 'categorias.nombre')->get();
        }
        $calzado = $calzadoAuctualizar->map(function ($calzado) {
            $Arreglo = [
                'id' => $calzado->id,
                'marca' => $calzado->marca,
                'color' => $calzado->color,
                'precio' => $calzado->precio,
                'modelo' => $calzado->modelo,
                'existencia' => $calzado->existencia,
                'categoria' => $calzado->nombre,
                'viewDelete' => route('calzado.vistaEliminar', ['id' => $calzado->id]),
                'viewEdit' => route('calzado.vistaEditar', ['id' => $calzado->id]),
            ];
            return $Arreglo;
        });

        $categorias = CategoriaModel::all();
        $rutas = [
            'index' => route('calzado.index'),
            'indexCategoria' => route('categoria.index'),
        ];
        return Inertia::render('Zapateria/Calzado/CalzadoIndex', ['calzados' => $calzado, 'rutas' => $rutas, 'categorias' => $categorias]);
    }
    public function crearNuevoCalzado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'marca' => ['required', 'max:50'],
            'color' => ['required', 'max:50'],
            'precio' => ['required', 'numeric'],
            'modelo' => ['required', 'max:50'],
            'existencia' => ['required', 'numeric','max:300'],
            'categoria' => ['required', 'numeric'],
        ], [
            'required' => 'El campo :attribute es requerido',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres',
            'numeric' => 'El campo :attribute debe ser numerico',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $calzado = new CalzadoModel();
        $calzado->marca = $request->marca;
        $calzado->color = $request->color;
        $calzado->precio = $request->precio;
        $calzado->modelo = $request->modelo;
        $calzado->existencia = $request->existencia;
        $calzado->categoria = $request->categoria;
        $calzado->save();
        return redirect()->route('calzado.index');
    }
    public function vistaEliminar(Request $request)
    {
        $calzadofind = CalzadoModel::find($request->id);
        $calzado = [
            'id' => $calzadofind->id,
            'marca' => $calzadofind->marca,
            'color' => $calzadofind->color,
            'precio' => $calzadofind->precio,
            'modelo' => $calzadofind->modelo,
            'existencia' => $calzadofind->existencia,
            'categoria' => $calzadofind->categoria,
            'delete' => route('calzado.eliminarCalzado', ['id' => $calzadofind->id]),
            'index' => route('calzado.index'),
        ];

        return Inertia::render('Zapateria/Calzado/CalzadoDelete', ['calzado' => $calzado]);
    }

    public function eliminarCalzado(Request $request)
    {
        $find = CalzadoModel::find($request->id);
        $find->delete();
        return redirect()->route('calzado.index');
    }
    public function vistaEditar(Request $request)
    {
        $categorias = CategoriaModel::all();
        $calzadofind = CalzadoModel::find($request->id);
        $calzado = [
            'id' => $calzadofind->id,
            'marca' => $calzadofind->marca,
            'color' => $calzadofind->color,
            'precio' => $calzadofind->precio,
            'modelo' => $calzadofind->modelo,
            'existencia' => $calzadofind->existencia,
            'categoria' => $calzadofind->categoria,
            'index' => route('calzado.index'),
            'edit' => route('calzado.editarCalzado', ['id' => $calzadofind->id]),
        ];
        return Inertia::render('Zapateria/Calzado/CalzadoFormularioEditar', ['calzado' => $calzado, 'categorias' => $categorias]);
    }
    public function editarCalzado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'marca' => ['required', 'max:50'],
            'color' => ['required', 'max:50'],
            'precio' => ['required', 'numeric'],
            'modelo' => ['required', 'max:50'],
            'existencia' => ['required', 'numeric','max:300'],
            'categoria' => ['required', 'numeric'],
        ], [
            'required' => 'El campo :attribute es requerido',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $calzadoEditado = CalzadoModel::find($request->id);
        $calzadoEditado->marca = $request->marca;
        $calzadoEditado->color = $request->color;
        $calzadoEditado->precio = $request->precio;
        $calzadoEditado->modelo = $request->modelo;
        $calzadoEditado->existencia += $request->existencia;
        $calzadoEditado->categoria = $request->categoria;
        $calzadoEditado->save();
        return redirect()->route('calzado.index');
    }
}
