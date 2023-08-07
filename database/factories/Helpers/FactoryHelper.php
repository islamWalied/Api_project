<?php

namespace Database\Factories\Helpers;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class FactoryHelper
{

    /**
     * this function will get a random model id from the database
     * @param string | HasFactory $model
     */
    public static function getRandomModelId(string $model)
    {
        //get all model count

        $count = $model::query()->count();

        if($count == 0)
        {
            // if the model count is 0 then create a new record and get it

            return $model::factory()->create()->id;
        }
        else
        {
            // if the count is not zero then choose a random record from the post model and retrieve it
            return rand(1,$count);
        }
    }
}
