<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $fillable = ['platform', 'url'];

    public static function getIconClass($platform)
    {
        return match ($platform) {
            'facebook' => 'fab fa-facebook-f',
            'instagram' => 'fab fa-instagram',
            'tiktok' => 'fab fa-tiktok',
            'email' => 'fas fa-envelope',
            default => 'fas fa-link',
        };
    }
}
