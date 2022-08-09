<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRegisterRequest;
use App\Http\Requests\CardUpdateRequest;
use App\Models\Card;
use App\Models\Column;
use App\Models\User;

class CardController extends Controller
{
    public function store(Column $column, CardRegisterRequest $request)
    {

        $data = $request->validated();
        $data['order'] = $column->cards()->max('order') + 10;

        return $column->cards()->create($data);
    }

    public function update(Column $column, Card $card, CardUpdateRequest $request)
    {

        $card->update($request->validated());

        return $card;
    }

    public function destroy(Column $column, Card $card)
    {

        $card->delete();

        return response()->noContent();
    }
}
