<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\uplode_files;

class doctorController extends Controller
{
    use uplode_files;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $doctor=  doctor::where('status','1')->with('user')->paginate();
       foreach($doctor as $valu){
       $valu['image'] = asset('file/' . $valu->image);
       }
       return  $doctor;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email' ,$request->email)->first();
       
        $image = $this->SaveImg($request->image,'file/');

        $doctor= doctor::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'service_id' => $request->service_id,
            'image' => $image,
            'user_id' => $user->id,
            'location' => $request->location,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        return $doctor->load('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
    {
        $doctor['image'] = asset('file/' . $doctor->image);
       
        return  $doctor->load('user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctor $doctor)
    {
        if($request->image){

           $image= $this->SaveImg($request->image,'file/');
            $this->DeleteImg($doctor->image,'file');

        }else{
            $image= $doctor->image;
        }

        $doctor->update([
          
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'service_id' => $request->service_id,
            'image' => $image,
            'location' => $request->location,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
           

        ]);

        return [
            'code' => 'done'
        ];
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctor $doctor)
    {
     $doctor->delete();
     $this->DeleteImg($doctor->image,'file');
     return [
        'code' => 'done',
     ];
        
    }
}
