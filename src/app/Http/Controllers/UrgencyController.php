<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Invoice;
use App\InvoiceDetail;
use App\Patient;
use App\User;
use App\MedicalInfo;
use App\Prescription;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Exception;
use Illuminate\Support\Facades\File;

class UrgencyController extends Controller
{
    protected $patient_info, $medical_info, $MedicalInfo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('sentinel.auth');
        $this->patient_info = new Patient();
        $this->medical_info = new MedicalInfo();
        $this->middleware(function ($request, $next) {
            if (session()->has('page_limit')) {
                $this->limit = session()->get('page_limit');
            } else {
                $this->limit = Config::get('app.page_limit');
            }
            return $next($request);
        });
    }

    /**
     * Search patient for img o curp
     * 
     * @return \Illuminate\Http\Response
     * */
    public function searchpatient(Request $request){

        $user = Sentinel::getUser();
        if ($user->hasAccess('patient.create')) {
            $role = $user->roles[0]->slug;
            $patient = null;
            $patient_info = null;
            $medical_info = null;
            return view('patient.urgency-searchpatient', compact('user', 'role', 'patient', 'patient_info', 'medical_info'));
        } else {
            return view('error.403');
        }
    }


        /**
     * Search patient for img o curp
     * 
     * @return \Illuminate\Http\Response
     * */
    /*public function searchpatientbyface(Request $request){

        
        $facex = new FaceController;

        $users = User::latest()->get();

        foreach($users as $user){

            $profile_photo = 'app/public/images/users/.' . $user->profile_photo;

            if (File::exists($profile_photo)) {

                $result = json_decode($facex->compare( storage_path('app/public/images/users'.$user->profile_photo), $request->file('face_image') ) );

                return dd($result);

                if($result["success"]){
                    return response()->json($user);
                    break;
                }
            }

        }

        return response()->json([ "notfound" => true, "msg" => "No se encontro datos del paciente por reconocimiento facial" ]);
        
    }*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Sentinel::getUser();
        if ($user->hasAccess('patient.create')) {
            $role = $user->roles[0]->slug;
            $patient = null;
            $patient_info = null;
            $medical_info = null;
            return view('patient.urgency-details', compact('user', 'role', 'patient', 'patient_info', 'medical_info'));
        } else {
                        return view('error.403');

        }
    }


    /**
     * Show the form for creating a new urgency by patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function createbyid($id)
    {
        $user = Sentinel::getUser();

        $userp = User::where("id",$id)->first();

        if ($user->hasAccess('patient.create')) {
            $role = $user->roles[0]->slug;
            $patient = $userp;
            $patient_info = null;
            $medical_info = null;
            return view('patient.urgency-details', compact('user', 'role', 'patient', 'patient_info', 'medical_info'));
        } else {
                        return view('error.403');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
