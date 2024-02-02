<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\PatientOnWebResource;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatienttopResource;
use App\Models\Patient;
use App\Repositories\Patients\PatientRepository;
use App\Rules\PatientValidation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    private $RepositoryPatient;
    public function __construct(PatientRepository $RepositoryPatient)
    {
        $this->PatientRepository = $RepositoryPatient;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list =  $this->PatientRepository->getData();

        return PatientResource::collection($list)->additional(
            [
                'message' => true,
                'httpCode' => Response::HTTP_OK,
            ]
        );
    }
    public function update()
    {

        $list =  $this->PatientRepository->gettopNum();
        return PatienttopResource::collection($list)->additional(
            [
                'message' => true,
                'httpCode' => Response::HTTP_OK,
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
}
