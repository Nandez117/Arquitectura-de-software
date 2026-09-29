<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Human Model
 *
 * @property int $id
 * @property string $name
 * @property int $aura
 * @property string $hierarchy
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Human extends Model
{
    protected $fillable = [
        'name',
        'aura',
        'hierarchy',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getAura(): int
    {
        return $this->attributes['aura'];
    }

    public function setAura(int $aura): void
    {
        $this->attributes['aura'] = $aura;
    }

    public function getHierarchy(): string
    {
        return $this->attributes['hierarchy'];
    }

    public function setHierarchy(string $hierarchy): void
    {
        $this->attributes['hierarchy'] = $hierarchy;
    }

    public function getCreatedAt(): ?string
    {
        return isset($this->attributes['created_at']) ? (string) $this->attributes['created_at'] : null;
    }

    public function getUpdatedAt(): ?string
    {
        return isset($this->attributes['updated_at']) ? (string) $this->attributes['updated_at'] : null;
    }
}
