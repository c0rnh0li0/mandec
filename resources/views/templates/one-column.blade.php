@extends("master.index")
@section("content")
    <div class="mandec-section {{ $sections[0]->html_name }}" data-section="{{ $sections[0]->id }}" data-page="{{ $page->id }}">
        <section id="banner" class="draggable-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            Initial template data [inserted]:  - One column
                        </div>
                    </div>
                </div>
            </div>
            <div class="scrolldown">
                <a id="scroll" href="#features" class="scroll"></a>
            </div>
        </section>
    </div>
@endsection