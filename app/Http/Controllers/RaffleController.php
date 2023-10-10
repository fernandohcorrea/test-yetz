<?php

namespace App\Http\Controllers;

use App\Yetz\Repositories\RaffleRepository;
use Illuminate\Support\Facades\Validator;

class RaffleController extends Controller
{
    /**
     * @var RaffleRepository
     */
    private $raffleRepository;

    public function __construct(RaffleRepository $raffleRepository)
    {
        $this->raffleRepository = $raffleRepository;
    }

    /**
     * Create Raffle Action
     *
     * @return void
     */
    public function create()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'game_id' => [
                'required',
                'numeric',
            ],
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()], 402);
        }

        $result = $this->raffleRepository->create($data['game_id']);
        return response()->json($result, 200);
    }

}
