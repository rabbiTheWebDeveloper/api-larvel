<?php

namespace App\Models;

use App\Models\Traits\HasPrimaryUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    use HasFactory, HasPrimaryUuid;
    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function support_ticket()
    {
        return $this->belongsTo(SupportTicket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }
}
