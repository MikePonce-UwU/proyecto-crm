<?php 
namespace App\Enums;

enum StatusEnum: string {
    case Pending = 'pending';
    case Cancelled = 'cancelled';
    case Confirmed = 'confirmed';
    case Sold = 'sold';
}