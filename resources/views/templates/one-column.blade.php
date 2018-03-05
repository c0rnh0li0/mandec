@extends("master.index")

@section("content")
    @if (isset($sections))
        @foreach($sections as $section)
            <div class="mandec-section {{ $section['name'] }} {{ $section['section_css_classes'] }}" data-section="{{ $section['section_id'] }}" data-page="{{ $section['page_id'] }}">
                @foreach($section['widgets'] as $widget)
                    {!! $widget !!}
                @endforeach
            </div>
        @endforeach
    @endif
@endsection