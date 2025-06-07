<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $funcionarios = Funcionario::all();
    return view('funcionarios.index', compact('funcionarios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:funcionarios,cpf',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|regex:/^[0-9]{10,15}$/',
            'genero' => 'required|in:Masculino,Feminino,Outro',
        ]);
    
        Funcionario::create($request->all());
    
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cpf)
{
    $funcionario = Funcionario::findOrFail($cpf);
    return view('funcionarios.edit', compact('funcionario'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $cpf)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|size:11|unique:funcionarios,cpf,' . $cpf . ',cpf',
        'data_nascimento' => 'required|date',
        'telefone' => 'required|regex:/^[0-9]{8,15}$/',
        'genero' => 'required|in:Masculino,Feminino,Outro',
    ]);

    $funcionario = Funcionario::findOrFail($cpf);
    $funcionario->update($request->all());

    return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cpf)
{
    $funcionario = Funcionario::findOrFail($cpf);
    $funcionario->delete();

    return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
}
}
