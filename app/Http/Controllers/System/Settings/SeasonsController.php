<?php

namespace App\Http\Controllers\System\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Http\Traits\LogTrait;
use App\Models\Settings\Keyword;
use App\Models\Settings\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeasonsController extends Controller{
    use LogTrait;

    protected $_active = 2;
    protected $_path = 'system.settings.seasons.';

    public function index(){
        $episodes = Season::where('id', '>', 0)->orderBy('id');
        $episodes = Filters::filter($episodes);
        $filters = [
            'season' => __('Sezona'),
            'episode' => __('Epizoda'),
            'date' => __('Datum')
        ];

        return view($this->_path.'index', [
            'episodes' => $episodes,
            'filters' => $filters
        ]);
    }
    public function preview(){
        $active = Keyword::where('type', '=', 'seasons')->where('value', '=', $this->_active)->first();

        return view($this->_path.'create', [
            'seasons' => Keyword::where('type', '=', 'seasons')->pluck('name', 'id'),
            'preview' => true
        ]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Sync data from central system
     */
    public function sync(){
        try{
            $data = $this::fetchData('GET', 'api/sync/seasons');
            $jsonData = json_decode($data->getBody()->getContents());

            if($jsonData->code == '0000'){
                /*
                 *  First step is to clean data table; Truncate all data
                 */
                Season::truncate();

                /*
                 *  Insert fresh data into database
                 */

                foreach ($jsonData->data as $season){
                    Season::create([
                        'id' => $season->id,
                        'season_id' => $season->season_id,
                        'episode' => $season->episode,
                        'date' => $season->date
                    ]);
                }

                return back()->with('success', __('Sinhronizacija epizoda uspješno završena!'));
            }else{
                $this->write('SeasonsController::sync()', $jsonData->code, $jsonData->message);
                return back()->with('error', __('Problem u komunikaciji sa centralnim sistemom. Molimo pokušajte ponovo!'));
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
}
