<?php

namespace App\Http\Controllers\Member;;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PDF;
use Mail;
use App\Game;
use App\AdminDashboard;
use App\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Game $game, User $user, AdminDashboard $AdminDashboard)
    {
        $user = auth()->user();
        $currentUser = User::find(auth()->user()->id);

        $total = Cart::Subtotal();

        $credits = $currentUser->credits;

        if ($credits - $total >= 0) {

            $pdf = PDF::loadView('member/cart/receipt');
            $pdf->download('receipt.pdf');

            $data["email"] = $user->email;
            $data["title"] = "Eshopping";

            $files = [
                public_path('receipt.pdf'),
            ];

            Mail::send('member/cart/receipt', $data, function ($message) use ($data, $files) {
                $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);

                foreach ($files as $file) {
                    $message->attach($file);
                }
            });

            $newCredits = $credits - $total;
            $currentUser->credits = $newCredits;
            $currentUser->save();

            
            $AdminDashboard = new AdminDashboard();
            $AdminDashboard->totalOfsells += $total;

            $AdminDashboard->save();


            Cart::destroy();
            return redirect()
                ->route('member.cart.index')->with('game', $game)
                ->with('success', 'Le jeu a bien été acheter, vous allez recevoir un mail avec la facture et le code pour activer le jeu');
        } else {
            return redirect()->route('member.cart.index')->with('error', 'Crédits insuffisant !');
        }
    }
}
