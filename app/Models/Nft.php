<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nft extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nft';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'artiste',
        'proprietaire',
        'description',
        'adresse_du_contrat',
        'token_standard',
        'prix',
        'image',
        'categorie',
        'owner_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'prix' => 'decimal:5',
    ];
    public function owner()
{
    return $this->belongsTo(User::class, 'proprietaire');
}
}
