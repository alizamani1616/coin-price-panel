<?php

namespace App\Models;

use System\Model;

class CoinsModel extends Model
{

    protected $table = 'coins';

    public function all()
    {
          return $response = file_get_contents("https://min-api.cryptocompare.com/data/top/mktcapfull?limit=30&tsym=USD&api_key=371c6b7eca782d9b03c3eb4e6f4f1dda1d274f8dd03720f29ccee940c4224d8b");
    }



}
