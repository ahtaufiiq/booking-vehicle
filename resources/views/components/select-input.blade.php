@props(['disabled' => false,"collection"])
<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value="" selected disabled hidden>Choose here</option>
    @foreach ($collection as $item)
        <option value="{{$item['id']}}">{{$item['value']}}</option>    
    @endforeach
</select>
