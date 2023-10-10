<?php

namespace App\Http\Controllers;

use App\Yetz\Repositories\GameRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * Constructor
     *
     * @param GameRepository $gameRepository
     */
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $data = $this->gameRepository->all();
        return response()->json($data, 200);
    }

    /**
     * Create Game Action
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'scheduling_at' => [
                'required',
                'date_format:Y-m-d',
            ],
            'soccer_field_id' => [
                'required',
                'numeric',
            ],
            'num_team_players' => [
                'required',
                'numeric',
                'min:1',
                'max:5',
            ]
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()], 402);
        }
        $result = $this->gameRepository->create($data);
        return response()->json($result, 201);
    }

    /**
     * Confirm Players Action
     *
     * @param Request $request
     * @param integer $game_id
     * @return void
     */
    public function confirmPlayers(Request $request, int $game_id): JsonResponse
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'players_ids' => [
                'required',
                'array',
                'numeric_array'
            ],
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()], 402);
        }

        $result = $this->gameRepository->confirmPlayers($game_id, $data);

        return response()->json([
            'success' => $result
        ], $result ? 201 : 202);
    }
}
