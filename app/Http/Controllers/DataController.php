<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:json|max:1024',
        ]);

        $file = $request->file('file');

        $json = file_get_contents($file);

        $request->session()->forget('json');
        $request->session()->forget('lastUpdated');
        $request->session()->put('json', $json);
        $request->session()->put('lastUpdated', date('H:i:s d.m.Y'));

        return redirect()->route('data');
    }

    public function getData()
    {
        $json = session()->get('json');

        /* decode json */
        $data = json_decode($json, true);

        $players = $this->getPlayers($data['players']);

        $data = new \stdClass();
        $data->lastUpdated = date('H:i:s d.m.Y');
        $data->players = $players;

        return $data;
    }

    private function getPlayers($data)
    {
        $players = array();
        foreach ($data as $key => $player) {
            if (!isset($player['playlistData'])) {
                $players[$key]['username']  = $player['name'];
                $players[$key]['meetCount'] = 0;
                $players[$key]['data']      = null;
                $players[$key]['timeMet']   = $player['timeMet'];
                $players[$key]['updatedAt'] = (!isset($player['updatedAt']) ? null : $player['updatedAt']);
            } else {
                $players[$key]['username']  = $player['name'];
                $players[$key]['meetCount'] = 0;
                $players[$key]['data']      = $this->gameMode($player['playlistData']);
                $players[$key]['timeMet']   = $player['timeMet'];
                $players[$key]['updatedAt'] = (!isset($player['updatedAt']) ? null : $player['updatedAt']);

                foreach ($players[$key]['data'] as $gamemode => $d) {
                    $players[$key]['meetCount'] += $d['gamesPlayed'];
                }
            }
        }
        return $players;
    }

    private function gameMode($data)
    {
        $gm = array();
        foreach ($data as $gamemode => $d) {
            switch ($gamemode) {
                    //Duel
                case (1):
                    $gm['Duel'] = $this->getDataFromMode($d);
                    break;
                    //Doubles
                case (2):
                    $gm['Doubles'] = $this->getDataFromMode($d);
                    break;
                    //Standard
                case (3):
                    $gm['Standard'] = $this->getDataFromMode($d);
                    break;
                    //Chaos
                case (4):
                    $gm['Chaos'] = $this->getDataFromMode($d);
                    break;
                    //PrivateMatch
                case (6):
                    $gm['PrivateMatch'] = $this->getDataFromMode($d);
                    break;
                    //OfflineSeason
                case (7):
                    $gm['OfflineSeason'] = $this->getDataFromMode($d);
                    break;
                    //OfflineSplitscreen
                case (8):
                    $gm['OfflineSplitscreen'] = $this->getDataFromMode($d);
                    break;
                    //Training
                case (9):
                    $gm['Training'] = $this->getDataFromMode($d);
                    break;
                    //RankedDuel 
                case (10):
                    $gm['RankedDuel'] = $this->getDataFromMode($d);
                    break;
                    //RankedDoubles 
                case (11):
                    $gm['RankedDoubles'] = $this->getDataFromMode($d);
                    break;
                    //RankedSoloStandard 
                case (12):
                    $gm['RankedSoloStandard'] = $this->getDataFromMode($d);
                    break;
                    //RankedStandard 
                case (13):
                    $gm['RankedStandard'] = $this->getDataFromMode($d);
                    break;
                    //MutatorMashup 
                case (14):
                    $gm['MutatorMashup'] = $this->getDataFromMode($d);
                    break;
                    //SnowDay 
                case (15):
                    $gm['SnowDay'] = $this->getDataFromMode($d);
                    break;
                    //RocketLabsOld 
                case (16):
                    $gm['RocketLabsOld'] = $this->getDataFromMode($d);
                    break;
                    //Hoops 
                case (17):
                    $gm['Hoops'] = $this->getDataFromMode($d);
                    break;
                    //Rumble 
                case (18):
                    $gm['Rumble'] = $this->getDataFromMode($d);
                    break;
                    //Workshop 
                case (19):
                    $gm['Workshop'] = $this->getDataFromMode($d);
                    break;
                    //TrainingEditor 
                case (20):
                    $gm['TrainingEditor'] = $this->getDataFromMode($d);
                    break;
                    //CustomTraining 
                case (21):
                    $gm['CustomTraining'] = $this->getDataFromMode($d);
                    break;
                    //Tournament 
                case (22):
                    $gm['Tournament'] = $this->getDataFromMode($d);
                    break;
                    //Dropshot 
                case (23):
                    $gm['Dropshot'] = $this->getDataFromMode($d);
                    break;
                    //LocalMatch 
                case (24):
                    $gm['LocalMatch'] = $this->getDataFromMode($d);
                    break;
                    //ExternalMatchRanked 
                case (26):
                    $gm['ExternalMatchRanked'] = $this->getDataFromMode($d);
                    break;
                    //RankedHoops 
                case (27):
                    $gm['RankedHoops'] = $this->getDataFromMode($d);
                    break;
                    //RankedRumble 
                case (28):
                    $gm['RankedRumble'] = $this->getDataFromMode($d);
                    break;
                    //RankedDropshot 
                case (29):
                    $gm['RankedDropshot'] = $this->getDataFromMode($d);
                    break;
                    //RankedSnowDay 
                case (30):
                    $gm['RankedSnowDay'] = $this->getDataFromMode($d);
                    break;
                    //GhostHunt 
                case (31):
                    $gm['GhostHunt'] = $this->getDataFromMode($d);
                    break;
                    //BeachBall 
                case (32):
                    $gm['BeachBall'] = $this->getDataFromMode($d);
                    break;
                    //SpikeRush 
                case (33):
                    $gm['SpikeRush'] = $this->getDataFromMode($d);
                    break;
                    //TournamentMatchAutomatic 
                case (34):
                    $gm['TournamentMatchAutomatic'] = $this->getDataFromMode($d);
                    break;
                    //RocketLabs 
                case (35):
                    $gm['RocketLabs'] = $this->getDataFromMode($d);
                    break;
                    //DropshotRumble 
                case (37):
                    $gm['DropshotRumble'] = $this->getDataFromMode($d);
                    break;
                    //Heatseeker 
                case (38):
                    $gm['Heatseeker'] = $this->getDataFromMode($d);
                    break;
                    //BoomerBall 
                case (41):
                    $gm['BoomerBall'] = $this->getDataFromMode($d);
                    break;
                    //HeatseekerDoubles 
                case (43):
                    $gm['HeatseekerDoubles'] = $this->getDataFromMode($d);
                    break;
                    //WinterBreakaway 
                case (44):
                    $gm['WinterBreakaway'] = $this->getDataFromMode($d);
                    break;
                    //Gridiron 
                case (46):
                    $gm['Gridiron'] = $this->getDataFromMode($d);
                    break;
                    //SuperCube 
                case (47):
                    $gm['SuperCube'] = $this->getDataFromMode($d);
                    break;
                    //TacticalRumble 
                case (48):
                    $gm['TacticalRumble'] = $this->getDataFromMode($d);
                    break;
                    //SpringLoaded 
                case (49):
                    $gm['SpringLoaded'] = $this->getDataFromMode($d);
                    break;
                    //SpeedDemon 
                case (50):
                    $gm['SpeedDemon'] = $this->getDataFromMode($d);
                    break;
                    //RumbleBM 
                case (52):
                    $gm['RumbleBM'] = $this->getDataFromMode($d);
                    break;
                    //Knockout 
                case (54):
                    $gm['Knockout'] = $this->getDataFromMode($d);
                    break;
                    //Thirdwheel
                case (55):
                    $gm['Thirdwhee'] = $this->getDataFromMode($d);
                    break;
            }
        }
        return $gm;
    }

    private function getDataFromMode($data)
    {
        $dataFromMode = array();
        $dataFromMode['gamesPlayed'] = 0;
        $dataFromMode['with'] = array();
        $dataFromMode['against'] = array();

        if (isset($data['records']['with'])) {
            $dataFromMode['with']['wins'] = $data['records']['with']['wins'];
            $dataFromMode['with']['losses'] = $data['records']['with']['losses'];
            $dataFromMode['with']['winrate'] = round($dataFromMode['with']['wins'] / ($dataFromMode['with']['wins'] + $dataFromMode['with']['losses']) * 100, 2);
        } else {
            $dataFromMode['with']['wins'] = 0;
            $dataFromMode['with']['losses'] = 0;
            $dataFromMode['with']['winrate'] = 0;
        }

        if (isset($data['records']['against'])) {
            $dataFromMode['against']['wins'] = $data['records']['against']['wins'];
            $dataFromMode['against']['losses'] = $data['records']['against']['losses'];
            $dataFromMode['against']['winrate'] = round($dataFromMode['against']['wins'] / ($dataFromMode['against']['wins'] + $dataFromMode['against']['losses']) * 100, 2);
        } else {
            $dataFromMode['against']['wins'] = 0;
            $dataFromMode['against']['losses'] = 0;
            $dataFromMode['against']['winrate'] = 0;
        }

        $dataFromMode['gamesPlayed'] = $dataFromMode['with']['wins'] + $dataFromMode['with']['losses'] + $dataFromMode['against']['wins'] + $dataFromMode['against']['losses'];

        return $dataFromMode;
    }

    public function filter($players, $sortBy = "meetCount", $sort = "desc", $mode = 'all', $number = 50)
    {
        /* Get all player from gamemode if not all  */
        if ($mode != "all") {
            $players = array_filter($players, function ($player) use ($mode) {
                if ($player['data'] != null) {
                    foreach ($player['data'] as $gamemode => $d) {
                        if ($gamemode == $mode) {
                            return true;
                        }
                    }
                }
                return false;
            });
        }

        /* Sort by */
        switch ($sortBy) {
            case ("meetCount"):
                usort($players, function ($a, $b) use ($sort) {
                    if ($sort == "desc") {
                        return $b['meetCount'] <=> $a['meetCount'];
                    } else {
                        return $a['meetCount'] <=> $b['meetCount'];
                    }
                });
                break;
            case ("username"):
                usort($players, function ($a, $b) use ($sort) {
                    if ($sort == "desc") {
                        return $b['username'] <=> $a['username'];
                    } else {
                        return $a['username'] <=> $b['username'];
                    }
                });
                break;
            case ("updatedAt"):
                usort($players, function ($a, $b) use ($sort) {
                    $dateA = strtotime($a['updatedAt']);
                    $dateB = strtotime($b['updatedAt']);

                    if ($sort == "desc"
                    ) {
                        return $dateB <=> $dateA;
                    } else {
                        return $dateA <=> $dateB;
                    }
                });
                break;
            case ("timeMet"):
                usort($players, function ($a, $b) use ($sort) {
                    $dateA = strtotime($a['timeMet']);
                    $dateB = strtotime($b['timeMet']);

                    if ($sort == "desc"
                    ) {
                        return $dateB <=> $dateA;
                    } else {
                        return $dateA <=> $dateB;
                    }
                });
                break;
        }

        if ($number != "all") {
            $players = array_slice($players, 0, $number);
        }

        $stats = new \stdClass();
        $stats->players = 0;
        $stats->party = 0;
        $stats->victory = 0;
        $stats->lose = 0;
        $stats->noData = 0;
        $stats->winrate = 0;

        foreach ($players as $key => $player) {
            $stats->players++;
            if ($player['data'] != null) {
                foreach ($player['data'] as $gamemode => $d) {
                    if ($mode == "all" || $mode == $gamemode) {
                        $stats->victory += $d['with']['wins'];
                        $stats->lose += $d['with']['losses'];
                        $stats->victory += $d['against']['wins'];
                        $stats->lose += $d['against']['losses'];
                    }
                }
            } else {
                $stats->noData++;
            }
        }

        $stats->party = $stats->victory + $stats->lose + $stats->noData;

        /* si $players array est pas vide */
        if ($stats->victory != 0 || $stats->lose != 0) {
            $stats->winrate = round($stats->victory / ($stats->victory + $stats->lose) * 100, 2);
        }

        $filteredData = new \stdClass();
        $filteredData->players = $players;
        $filteredData->stats = $stats;

        return $filteredData;
    }
    
    public function getAllGameMode()
    {
        $gameMode = array();
        $gameMode['Duel'] = "Duel";
        $gameMode['Doubles'] = "Doubles";
        $gameMode['Standard'] = "Standard";
        $gameMode['Chaos'] = "Chaos";
        $gameMode['PrivateMatch'] = "Private Match";
        $gameMode['OfflineSeason'] = "Offline Season";
        $gameMode['OfflineSplitscreen'] = "Offline Splitscreen";
        $gameMode['Training'] = "Training";
        $gameMode['RankedDuel'] = "Ranked Duel";
        $gameMode['RankedDoubles'] = "Ranked Doubles";
        $gameMode['RankedSoloStandard'] = "Ranked Solo Standard";
        $gameMode['RankedStandard'] = "Ranked Standard";
        $gameMode['MutatorMashup'] = "Mutator Mashup";
        $gameMode['SnowDay'] = "Snow Day";
        $gameMode['RocketLabsOld'] = "Rocket Labs Old";
        $gameMode['Hoops'] = "Hoops";
        $gameMode['Rumble'] = "Rumble";
        $gameMode['Workshop'] = "Workshop";
        $gameMode['TrainingEditor'] = "Training Editor";
        $gameMode['CustomTraining'] = "Custom Training";
        $gameMode['Tournament'] = "Tournament";
        $gameMode['Dropshot'] = "Dropshot";
        $gameMode['LocalMatch'] = "Local Match";
        $gameMode['ExternalMatchRanked'] = "External Match Ranked";
        $gameMode['RankedHoops'] = "Ranked Hoops";
        $gameMode['RankedRumble'] = "Ranked Rumble";
        $gameMode['RankedDropshot'] = "Ranked Dropshot";
        $gameMode['RankedSnowDay'] = "Ranked Snow Day";
        $gameMode['GhostHunt'] = "Ghost Hunt";
        $gameMode['BeachBall'] = "Beach Ball";
        $gameMode['SpikeRush'] = "Spike Rush";
        $gameMode['TournamentMatchAutomatic'] = "Tournament Match Automatic";
        $gameMode['RocketLabs'] = "Rocket Labs";
        $gameMode['DropshotRumble'] = "Dropshot Rumble";
        $gameMode['Heatseeker'] = "Heatseeker";
        $gameMode['BoomerBall'] = "Boomer Ball";
        $gameMode['HeatseekerDoubles'] = "Heatseeker Doubles";
        $gameMode['WinterBreakaway'] = "Winter Breakaway";
        $gameMode['Gridiron'] = "Gridiron";
        $gameMode['SuperCube'] = "Super Cube";
        $gameMode['TacticalRumble'] = "Tactical Rumble";
        $gameMode['SpringLoaded'] = "Spring Loaded";
        $gameMode['SpeedDemon'] = "Speed Demon";
        $gameMode['RumbleBM'] = "Rumble BM";
        $gameMode['Knockout'] = "Knockout";
        $gameMode['Thirdwheel'] = "Thirdwheel";
        return $gameMode;
    }    
}
