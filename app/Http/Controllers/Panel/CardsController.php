<?php

namespace App\Http\Controllers\Panel;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardsController extends Controller
{
    // admin methods below
    public function index()
    {
        $cards = Card::all();
        return view('pages.admin.cards.cards', compact('cards'));
    }

    public function show($id)
    {
        $card = Card::find($id);
        if (!$card) {
            return redirect()->route('admin.cards')->with('error', 'Card not found.');
        }
        return view('pages.admin.cards.single', compact('card'));
    }

    // public function edit($id)
    // {
    //     $card = Card::find($id);
    //     $cardStatuses = Card::getStatuses();
    //     if (!$card) {
    //         return redirect()->route('admin.cards')->with('error', 'Card not found.');
    //     }
    //     return view('pages.admin.cards.edit', compact('card', 'cardStatuses'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $card = Card::find($id);
    //     if (!$card) {
    //         return redirect()->route('admin.cards')->with('error', 'Card not found.');
    //     }

    //     $request->validate([
    //         'status' => 'required|string',
    //     ]);

    //     $data = $request->except('_token');
    //     $card->update($data);

    //     return redirect()->route('admin.cards')->with('success', 'Card updated successfully.');
    // }

    public function delete($id)
    {
        $card = Card::find($id);

        if (!$card) {
            return redirect()->route('admin.cards')->with('error', 'Card not found.');
        }

        $card->status = 'disabled';
        $card->delete();

        return redirect()->route('admin.cards')->with('success', 'Card deleted successfully.');
    }

    // user methods below

    public function userCards()
    {
        $cards = auth()->user()->cards()->orderBy('created_at', 'desc')->get();
        return view('pages.user.cards.cards', compact('cards'));
    }

    public function userShow($id)
    {
        $card = Card::find($id);

        if (!$card) {
            return redirect()->route('user.cards')->with('error', 'Card not found.');
        }

        return view('pages.user.cards.single', compact('card'));
    }

}
