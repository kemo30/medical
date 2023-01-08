<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\serviceRequest;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\uplode_files;

class serviceController extends Controller
{
    use uplode_files;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return service::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(serviceRequest $request)
    {
        // $path = Storage::putFile('image', $request->image);
        
       
        $data = $request->all();

        $data['image'] = $this->SaveImg($request->image, 'file/');
        $data['icon'] = $this->SaveImg($request->icon, 'file/');

        $service = service::create($data);

        $service['image'] = asset('file/' . $service->image);
        $service['icon'] = asset('file/' . $service->icon);
        return $service;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        return $service;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(serviceRequest $request, service $service)
    {
        $data = $request->all();
       
        //image chack
        if( $request->image ){
        $image = $this->SaveImg($request->image, 'file/');
        $this->DeleteImg($service->image,'file');
        }
        else{
        $image = $service->image;
        }
        // icon chack
        if( $request->icon ){
            $icon = $this->SaveImg($request->icon, 'file/');
            $this->DeleteImg($service->icon,'file');
        }
        else{
            $icon = $service->icon;
        }


        $data['image']=$image;
        $dat['icon'] = $icon;
        
        $service->update($data);
        return [
            'data' => 'update successfully'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        $service->delete();
        $this->DeleteImg($service->image,'file');
        
        return [
            'data' => 'delete successfully'
        ];
    }
}
