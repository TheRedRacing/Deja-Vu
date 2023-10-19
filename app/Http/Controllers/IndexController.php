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

        $sortBy = "timeMet";
        $order = "desc";
        $number = 25;
        $mode = "all";
        $username = null;
        $hideNoData = false;

        $stats = new \stdClass();
        $stats->allPlayers = count($getData->players);

        if ($username !== null) {
            $getData->players = $dataController->search($getData->players, $username);
        }
        $filteredData = $dataController->filter($getData->players, $sortBy, $order, $mode, $number, $hideNoData);

        $stats->players = count($filteredData->players);

        return view('data', [
            'lastUpdated' => $getData->lastUpdated,
            'players' => $filteredData->players,
            'stats' => $stats,
            'filter' => [
                'sortBy' => $sortBy,
                'order' => $order,
                'number' => $number,
                'mode' => $mode,
                'username' => $username,
                'hideNoData' => $hideNoData,
            ],
            'gameMode' => $dataController->getAllGameMode(),
        ])->with(['status' => 'success', 'message' => 'Your data has been updated!']);
    }

    public function filter(){
        return $this->data();
    }

    public function store(Request $request){
        $dataController = new DataController();
        $action = $request->action ?? $request->Lastaction ?? "timeMet,desc";
        $sortBy = explode(',', $action)[0];
        $order = explode(',', $action)[1];
        $number = $request->number;
        $username = $request->username ?? null;
        $mode = $request->gameMode;
        $hideNoData = $request->hideNoData ?? "show";

        $getData = $dataController->getData();
        $stats = new \stdClass();
        $stats->allPlayers = count($getData->players);        

        if ($username !== null) {
            $getData->players = $dataController->search($getData->players, $username);
        }
        $filteredData = $dataController->filter($getData->players, $sortBy, $order, $mode, $number, $hideNoData);

        $stats->players = count($filteredData->players);

        return view('data', [
            'lastUpdated' => $getData->lastUpdated,
            'players' => $filteredData->players,
            'stats' => $stats,
            'filter' => [
                'sortBy' => $sortBy,
                'order' => $order,
                'number' => $number,
                'mode' => $mode,
                'username' => $username,
                'hideNoData' => $hideNoData,
            ],
            'gameMode' => $dataController->getAllGameMode(),
        ]);
    }
}
