<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class TransactionHistory extends Component
{
    public $email;
    public $transactions;

    public function search()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        $this->transactions = Order::where('email', $this->email)->get();

        if ($this->transactions->isNotEmpty()) {
            $firstOrder = $this->transactions->first();
            return redirect()->route('invoice', ['order' => $firstOrder->id]);
        }
    }

    public function render()
    {
        return view('livewire.transaction-history');
    }
}
