<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        // $path = Storage::putFile('image', $request->image);
        
       
        $data = $request->all();
        $data['image'] = $this->SaveImg($request->image, 'image/');
        $service = service::create($data);
        $service['image'] = asset('image/' . $service->image);
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
    public function update(Request $request, service $service)
    {
        $data = $request->all();
        $data['image'] = $this->SaveImg($request->image, 'image/');
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
        return [
            'data' => 'delete successfully'
        ];
    }
}
