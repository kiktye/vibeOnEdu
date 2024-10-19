<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index()
    {
        $modules = Module::all();
        return view('modules.index', ['modules' => $modules]);
    }

    public function store(Request $request)
    {
        $moduleAttributes = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $module = Module::create([
            'name' => $moduleAttributes['name'],
            'description' => $moduleAttributes['description'],
        ]);

        return redirect()->back()->with('success', 'Успешно напишан модул.');
    }

    public function update(Request $request, Module $modules)
    {

        $moduleAttributes = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);;

        $modules->update([
            'name' => $moduleAttributes['name'],
            'description' => $moduleAttributes['description'],
        ]);

        return redirect()->back()->with('success', 'Модулот  е успешно ажуриран!');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')->with('success', 'Успешно избришан Модул.');
    }

}
