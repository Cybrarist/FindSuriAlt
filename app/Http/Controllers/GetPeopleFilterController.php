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
            'name_second_lang' => ['nullable', 'string', 'max:255'],
            "born_on"=>['nullable', 'date'],
            "born_in"=>['nullable', 'string' , 'exists:cities,id'],
            "missing_at"=>['nullable', 'date'],
            "missing_in"=>['nullable', 'string' , 'exists:cities,id'],
            "province_id"=>['nullable', 'exists:provinces,id'],
        ]);


        $people=Person::query();

        if ($request->name || $request->name_second_lang)
            $people->whereAny(['name','name_second_lang'],"LIKE" ,["%{$request->name}%","%{$request->name_second_lang}%"]);

        if ($request->born_on)
            $people->orWhereDate('born_on' , '>=', $request->born_on);

        if ($request->missing_at)
            $people->orWhereDate('missing_at' , '>=', $request->missing_at);

        if ($request->missing_in)
            $people->where('missing_in', $request->missing_in);

        if ($request->born_in)
            $people->where('born_in', $request->born_in);

        if ($request->province_id)
            $people->whereIn("born_in",City::where('province_id',$request->province_id)->pluck('cities.id')->toArray());

        return JsonResource::collection($people->with('born_in_city:id,name','missing_in_city:id,name')->limit(20)->get());
    }
}
