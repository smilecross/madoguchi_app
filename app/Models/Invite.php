<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\FamilyPage;


class Invite extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'invited_by',
        'accepted_by',
        'family_page_id',
        'token',
        'status'
    ];

    public function invitedBy()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }

    public function acceptedBy()
    {
        return $this->belongsTo(User::class, 'accepted_by');
    }

    public function familyPage()
    {
        return $this->belongsTo(FamilyPage::class);
    }
}
