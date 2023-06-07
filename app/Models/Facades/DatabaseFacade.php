<?php

namespace App\Models\Facades;

use Illuminate\Support\Facades\DB;

class DatabaseFacade
{
    public function getClients(): array
    {
        return DB::table('customers')->where('isArchived', 0)->get()->toArray();
    }

    public function getUsers(): array
    {
        return DB::table('users')->get()->toArray();
    }
}
