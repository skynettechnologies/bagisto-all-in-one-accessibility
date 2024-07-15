<?php

namespace SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SkynetTechnologies\AllinOneAccessibility\Models\AllinOneAccessibility;
use Illuminate\Http\Request;

class AllinOneAccessibilityController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return view($this->_config['view']);

        $aioaData = AllinOneAccessibility::all();
        return view($this->_config['view'], ['aioaData' => $aioaData]);

        // return view('allinoneaccessibility::admin.index', ['aioaData' => $aioaData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view($this->_config['view']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'license_key' => 'required',
            'color_code' => 'required',
            'icon_position' => 'required',
        ]);
        if ($validatedData) {
            $data = $request->all();
            AllinOneAccessibility::create([
                'license_key' => $data['license_key'],
                'color_code' => $data['color_code'],
                'icon_position' => $data['icon_position'],
                'icon_type' => $data['icon_type'],
                'icon_size' => $data['icon_size'],
            ]);

            /* Start Save widget Settings on Dashboard */
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://ada.skynettechnologies.us/api/widget-setting-update-platform',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'u' => $request->getHttpHost(),
                    'widget_position' => (!empty($data['icon_position']) ? $data['icon_position'] : ""),
                    'widget_color_code' => (!empty($data['color_code']) ? $data['color_code'] : ""),
                    'widget_icon_type' => (!empty($data['icon_type']) ? $data['icon_type'] : "aioa-icon-type-1"),
                    'widget_icon_size' => (!empty($data['icon_size']) ? $data['icon_size'] : "aioa-medium-icon")
                ),
            )
            );
            $response = curl_exec($curl);
            curl_close($curl);

            return redirect('/admin/allinoneaccessibility')->with('success', 'Data saved successfully');

        } else {
            return redirect('/admin/allinoneaccessibility')->with('success', 'Please fill the License Key, Color Code, Icon Position');

            // return redirect('/admin/allinoneaccessibility')->with('fail', 'Please fill the License Key, Color Code, Icon Position');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view($this->_config['view']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = AllinOneAccessibility::find($id);
        $data->update($request->all());
        return redirect('/admin/allinoneaccessibility')->with('success', 'Data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
