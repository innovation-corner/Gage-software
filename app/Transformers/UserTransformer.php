<?php
/**
 * Created by PhpStorm.
 * User: gem
 * Date: 7/13/17
 * Time: 5:35 PM
 */

namespace App\Transformers;


use App\Models\User;
use  \League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $user)
    {

        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    }

    public function collect($collection)
    {
        $transformer = new UserTransformer();
        return collect($collection)->map(function ($model) use ($transformer) {
            return $transformer->transform($model);
        });
    }

}
