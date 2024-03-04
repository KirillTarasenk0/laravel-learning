<?php

namespace App\Mail;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerOrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Customer Order Status Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $orderNumber = request()->route('orderNumber');
        $customerNumber = Order::find($orderNumber)->customerNumber;
        $customerFirstName = Customer::find($customerNumber)->contactFirstName;
        $customerLastName = Customer::find($customerNumber)->contactLastName;
        $order = Order::find($orderNumber);
        return new Content(
            view: 'emails.customerOrderStatus',
            with: [
                'orderNumber' => $orderNumber,
                'customerFirstName' => $customerFirstName,
                'customerLastName' => $customerLastName,
                'orderStatus' => $order->status
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
