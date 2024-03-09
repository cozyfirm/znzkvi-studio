<?php

namespace App\Http\Controllers\System\Sponsors;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Sponsors\SponsorsData;
use Illuminate\Http\Request;

class SponsorsController extends Controller{
    protected $_path = 'system.sponsors.';
    protected $_message = "";

    public function index(){
        $sponsors = SponsorsData::where('id', '>', 0);
        $sponsors = Filters::filter($sponsors);
        $filters = [
            'title' => __('Naziv'),
            'elem_name' => __('ID Elementa'),
            'category' => __('Kategorija'),
            // 'status' => 'Status na TV-u'
        ];

        return view($this->_path . 'index', [
            'sponsors' => $sponsors,
            'filters' => $filters
        ]);
    }
    public function create(){
        return view($this->_path . 'create', [
            'create' => true
        ]);
    }
    public function save(Request $request){
        try{
            $fileName = null;
            if(isset($request->file)){
                $file = $request->file('file');
                $ext  = $file->getClientOriginalExtension();
                // if return back()->with('error', __('Format dokumenta nije podržan !'));
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $ext;

                $file->move(public_path('sounds/sponsors/'), $fileName);
            } // else return back()->with('error', __('Nije odabrana niti jedna datoteka!'));

            $data = SponsorsData::create([
                'title' => $request->title,
                'elem_name' => $request->elem_name,
                'category' => $request->category,
                'data' => $request->data,
                'sound' => $fileName
            ]);

            return redirect()->route('system.sponsors');
            dd($request->all());
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function delete($id){
        try{
            SponsorsData::where('id', $id)->delete();

            return back();
        }catch (\Exception $e){ return back(); }
    }

    /**
     *  Change status => MQTT Live data transfer
     */
    public function changeStatus(Request $request){
        try{
            $this->_message = [ 'sub_code' => '51200', "key" => "sponsors_data", "elem_id" => $request->elem_id, "real_id" => $request->real_id];

            /* Publish message to all screens (Admin portal) */
            $this->publishMessage($this->_tv_topic, '0000', $this->_message);


            dd($request->all());
        }catch (\Exception $e){
            dd($e);
        }
    }
}
