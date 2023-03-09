{{$isSuper = Auth::user()->role === \App\Enums\Role::ADMIN}}
{{dd($isSuper)}}
