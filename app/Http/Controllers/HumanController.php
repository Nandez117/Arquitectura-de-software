<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHumanRequest;
use App\Models\Human;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HumanController extends Controller
{
    public function home(): View
    {
        $viewData = [];
        $viewData['title'] = 'Zona de Inicio - Humanos';

        return view('human.home')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Registrar Humano';

        return view('human.create')->with('viewData', $viewData);
    }

    public function store(StoreHumanRequest $request): RedirectResponse
    {
        $human = new Human;
        $human->setName($request->input('name'));
        $human->setAura($request->input('aura'));
        $human->setHierarchy($request->input('hierarchy'));
        $human->save();

        return redirect()->route('humans.create')->with('success', 'Humano registrado exitosamente.');
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Lista de Humanos';
        $viewData['humans'] = Human::orderBy('aura', 'desc')->get();

        return view('human.index')->with('viewData', $viewData);
    }

    public function battle(): View
    {
        $viewData = [];
        $viewData['title'] = 'Batalla de Humanos';
        $humans = Human::orderBy('id')->take(2)->get();
        $viewData['humans'] = $humans;

        $winnerMessage = 'Faltan humanos para la batalla.';

        if ($humans->count() == 2) {
            $human1 = $humans[0];
            $human2 = $humans[1];

            if ($human1->getAura() > $human2->getAura()) {
                $winnerMessage = '¡Ganador: '.$human1->getName().'!';
            } elseif ($human2->getAura() > $human1->getAura()) {
                $winnerMessage = '¡Ganador: '.$human2->getName().'!';
            } else {
                $winnerMessage = '¡Es un empate!';
            }
        }

        $viewData['winnerMessage'] = $winnerMessage;

        return view('human.battle')->with('viewData', $viewData);
    }
}
