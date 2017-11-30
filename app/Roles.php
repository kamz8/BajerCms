<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

    private function getRoles(){
        foreach ($this->roles as $role) {
            return $role;
        }
    }

}
