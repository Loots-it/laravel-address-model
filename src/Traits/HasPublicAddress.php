<?php

declare(strict_types=1);

namespace LootsIt\Address\Traits;

use LootsIt\Address\Models\Address;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasPublicAddress
{
    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @param  string  $related
     * @param  string|null  $foreignKey
     * @param  string|null  $ownerKey
     * @param  string|null  $relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    abstract public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null): BelongsTo;

    /**
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    abstract public function save(array $options = []): bool;

    public Address $publicAddress;

    public function publicAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class)->withDefault();
    }

    public function updatePublicAddress(array $values): Address
    {
        $this->publicAddress->fill($values)->save();

        $this->publicAddress()->associate($this->publicAddress);
        $this->save();

        return $this->publicAddress;
    }
}