<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use App\Transation;
use App\TransationDetail;

use FFI\Exception;
use PhpParser\Node\Stmt\TryCatch;

class CheckoutController extends Controller
{
    //
    public function process(Request $request)
    {
        // simpan data users
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // proses checkout
        $code = 'SWA-' . mt_rand(0000,9999);
        $carts = Cart::with(['product','user'])
                ->where('users_id', Auth::user()->id)
                ->get();
        // Transaction Create
        $data['photo'] = $request->file('ktp_photo')->store('assets/transaction', 'public');
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'total_price' => $request->total_price,
            'booking_first' => $request->booking_first,
            'booking_last' => $request->booking_last,
            'ktp_photo' => $request->file('ktp_photo')->store('assets/transaction','public'),
            'selfie_photo' => $request->file('selfie_photo')->store('assets/transaction','public'),
            'day_total' => $request->day_total,
            'transaction_status' => 'Belum Diambil',
            'code' => $code
        ]);

        foreach($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000,9999);

            // transactiondetail
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'status_details' => 'Belum Diambil',
                'resi' => '',
                'code' => $trx
            ]);
        }

        // Hapus Data Keranjang
        Cart::with(['produk','user'])
            ->where('users_id', Auth::user()->id)
            ->delete();

        try {
            return redirect('success');
        } catch (\Throwable $th) {
            //throw $th;
        }
        


    }

    public function callback()
    {

    }
}
