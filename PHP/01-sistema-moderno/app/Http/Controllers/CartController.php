<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $items = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return Inertia::render('Cart/Index', [
            'cartItems' => $items
        ]);
    }


    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $item = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('message', 'Produto adicionado com sucesso!');
    }


    public function update(Request $request, $id)
    {
        $item = CartItem::where('user_id', Auth::id())->findOrFail($id);

        $item->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back();
    }


    public function destroy($id)
    {
        $item = CartItem::where('user_id', Auth::id())->findOrFail($id);

        $item->delete();

        return redirect()->back()->with('message', 'Item removido!');
    }
}
