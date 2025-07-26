<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductUpdatedNotification;
use Illuminate\Support\Facades\Auth;

class UpdateProductStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $product;

    /**
     * Create a new job instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->product->update([
            'status' => 'processed',
        ]);

        // Notify the user - but which user?? 
        $user = Auth::user(); 
        if ($user) {
            Notification::send($user, new ProductUpdatedNotification($this->product));
        }
    }
}
