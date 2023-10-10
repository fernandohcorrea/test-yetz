<?php

namespace App\Http\Controllers;

use App\Yetz\Repositories\SoccerFieldRepository;
use Illuminate\Http\JsonResponse;

class SoccerFieldController extends Controller
{
    /**
     * @var SoccerFieldRepository
     */
    private $soccerFieldRepository;

    /**
     * Constructor
     *
     * @param SoccerFieldRepository $soccerFieldRepository
     */
    public function __construct(SoccerFieldRepository $soccerFieldRepository)
    {
        $this->soccerFieldRepository = $soccerFieldRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function all(): JsonResponse
    {
        $data = $this->soccerFieldRepository->all();
        return response()->json($data, 200);
    }
}
