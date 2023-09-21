<?php

namespace App\Repository;

use App\Iface\ItemVariationRepositoryInterface;
use App\ItemVariation;

class ItemVariationRepository implements ItemVariationRepositoryInterface
{

    public function getItemVariationByItemId($id)
    {
        $item_attributes = ItemVariation::query()
            ->join('item_attributes', 'item_variations.item_attribute_id', '=', 'item_attributes.id')
            ->select('item_attributes.id', 'item_attributes.name')
            ->where(['item_id' => $id])
            ->groupBy('item_variations.item_attribute_id')->get();

        foreach ($item_attributes as $index => $value) {
            $options  = ItemVariation::query()
                ->join('item_attribute_options', 'item_variations.item_attribute_option_id', '=', 'item_attribute_options.id')
                ->where(['item_variations.item_id' => $id, 'item_variations.item_attribute_id' => $value['id']])
                ->select('item_attribute_options.id', 'item_attribute_options.name', 'item_attribute_options.price_adjustment')
                ->groupBy('item_variations.item_attribute_option_id')->get();
            $item_attributes[$index]['options'] = $options;
        }

        return $item_attributes;
    }
}
