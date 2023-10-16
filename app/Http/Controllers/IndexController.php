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

        $sordBy = "timeMet";
        $sort = "desc";
        $number = 250;
        $mode = "all";
        $getData = $dataController->getData();
        $filteredData = $dataController->filter($getData->players, $sordBy, $sort, $mode, $number);

        return view('welcome', [
            'lastUpdated' => $getData->lastUpdated,
            'players' => $filteredData->players,
            'stats' => $filteredData->stats,
            'filter' => [
                'sortBy' => $sordBy,
                'sort' => $sort,
                'number' => $number,
                'mode' => $mode,
            ],
            'gameMode' => $dataController->getAllGameMode(),
        ]);
    }

    public function store(Request $request){
        $dataController = new DataController();

        $sordBy = "timeMet";
        $sort = "desc";
        $number = $request->number;
        $mode = $request->gameMode;
        $getData = $dataController->getData();
        $filteredData = $dataController->filter($getData->players, $sordBy, $sort, $mode, $number);

        return view('welcome', [
            'lastUpdated' => $getData->lastUpdated,
            'players' => $filteredData->players,
            'stats' => $filteredData->stats,
            'filter' => [
                'sortBy' => $sordBy,
                'sort' => $sort,
                'number' => $number,
                'mode' => $mode,
            ],
            'gameMode' => $dataController->getAllGameMode(),
        ]);
    }
}
