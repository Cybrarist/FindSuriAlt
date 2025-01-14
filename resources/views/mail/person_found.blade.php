<p>According To your last Search, the following people are found</p>


<table>
    <thead>
    <th>Name</th>
    <th>Arabic Name</th>
    <th>Link</th>
    </thead>
    <tbody>
        @foreach($people as $person)
            <td>{{$person->name}}</td>
            <td>{{$person->name_second_lang}}</td>
            <td><a target="_blank" href="{{route('filament.public.resources.people.view', $person->id)}}">  Full Information </a> </td>
        @endforeach
    </tbody>
</table>
