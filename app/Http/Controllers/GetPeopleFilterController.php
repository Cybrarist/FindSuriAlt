<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPeopleFilterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'name_ar' => ['nullable', 'string', 'max:255'],
            "born_on"=>['nullable', 'date'],
            "born_in"=>['nullable', 'string' , 'exists:cities,id'],
            "arrested_at"=>['nullable', 'date'],
            "arrested_in"=>['nullable', 'string' , 'exists:cities,id'],
            "province_id"=>['nullable', 'exists:provinces,id'],
        ]);


        $people=Person::query();

        if ($request->name || $request->name_ar)
            $people->whereAny(['name','name_ar'],"LIKE" ,["%{$request->name}%","%{$request->name_ar}%"]);

        if ($request->born_on)
            $people->orWhereDate('born_on' , '>=', $request->born_on);

        if ($request->arrested_at)
            $people->orWhereDate('arrested_at' , '>=', $request->arrested_at);

        if ($request->arrested_in)
            $people->where('arrested_in', $request->arrested_in);

        if ($request->born_in)
            $people->where('born_in', $request->born_in);

        if ($request->province_id)
            $people->whereIn("born_in",City::where('province_id',$request->province_id)->pluck('cities.id')->toArray());

        return JsonResource::collection($people->with('born_in_city:id,name','arrested_in_city:id,name')->get());
    }
}
