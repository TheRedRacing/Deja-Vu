<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class IndexController extends Controller
{
    public function index()
    {
        return view('home');
    }    

    public function data() {
        $dataController = new DataController();
        $getData = $dataController->getData();
        if ($getData === null){
            return redirect()->route('home')->with(['status' => 'error', 'message' => 'No data found!']);
        }

        $sordBy = "timeMet";
        $order = "desc";
        $number = 25;
        $mode = "all";
        $filteredData = $dataController->filter($getData->players, $sordBy, $order, $mode, $number);

        return view('data', [
            'lastUpdated' => $getData->lastUpdated,
            'players' => $filteredData->players,
            'stats' => $filteredData->stats,
            'filter' => [
                'sortBy' => $sordBy,
                'order' => $order,
                'number' => $number,
                'mode' => $mode,
            ],
            'gameMode' => $dataController->getAllGameMode(),
        ])->with(['status' => 'success', 'message' => 'Your data has been updated!']);
    }

    public function store(Request $request){
        $dataController = new DataController();
        $action = $request->action;
        $sortBy = explode(',', $action)[0];
        $order = explode(',', $action)[1];
        $number = $request->number;
        $mode = $request->gameMode;

        $getData = $dataController->getData();
        $filteredData = $dataController->filter($getData->players, $sortBy, $order, $mode, $number);

        return view('data', [
            'lastUpdated' => $getData->lastUpdated,
            'players' => $filteredData->players,
            'stats' => $filteredData->stats,
            'filter' => [
                'sortBy' => $sortBy,
                'order' => $order,
                'number' => $number,
                'mode' => $mode,
            ],
            'gameMode' => $dataController->getAllGameMode(),
        ]);
    }
}
