<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVariation extends Model
{
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function attribute()
    {
        return $this->belongsTo(ItemAttribute::class);
    }

    public function attributeOption()
    {
        return $this->belongsTo(ItemAttributeOption::class);
    }
}
