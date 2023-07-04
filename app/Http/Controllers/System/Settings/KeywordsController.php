<?php

namespace App\Http\Controllers\System\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Settings\Keyword;
use Illuminate\Http\Request;

class KeywordsController extends Controller{
    protected $_path = 'system.settings.keywords.';

    /*
     *  Preview all keywords fetched from central system
     */
    public function index(){
        return view($this->_path.'index', [
            'keywords' => Keyword::orderBy('display')->get()->unique('display')
        ]);
    }
    /*
     *  Preview all instances fetched from central system
     */
    public function previewInstances($key){
        return view($this->_path.'preview-instances', [
            'instances' => Keyword::where('type', $key)->get(),
            'keyword' => Keyword::getKeyword($key),
            'key' => $key
        ]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Synchronisation method with central system
     */
    public function syncKeywords(){
        try{
            $data = $this::fetchData('GET', 'api/sync/keywords');
            $jsonData = json_decode($data->getBody()->getContents());

            if($jsonData->code == '0000'){
                /*
                 *  First step is to clean data table; Truncate all data
                 */
                Keyword::truncate();

                /*
                 *  Insert fresh data into database
                 */

                foreach ($jsonData->data as $keyword){
                    Keyword::create([
                        'id' => $keyword->id,
                        'display' => $keyword->display,
                        'type' => $keyword->type,
                        'name' => $keyword->name,
                        'description' => $keyword->description,
                        'value' => $keyword->value
                    ]);
                }

                return back()->with('success', __('Sinhronizacija šifarnika uspješno završena!'));
            }else{
                /* ToDo -- Log error into local database */
                return back()->with('error', __('Problem u komunikaciji sa centralnim sistemom. Molimo pokušajte ponovo!'));
            }

        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška prilikom sinhronizacije. Error code : ') . $e->getCode());
        }
    }
}
