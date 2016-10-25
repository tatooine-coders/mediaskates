@extends('layouts/simple')

<!--CDN bootstrap - Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@section('content')
@if(count($photos)>0)
<div style="text-align: center">
@foreach($photos as $photo)

<!--    <script type="text/javascript">

        var temp = "<div class='brick' style='width:{width}px;'>\n\
                    <img src='{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}' width='100%'>\n\
                    </div>";
        var w = 1, h = 1, html = '', limitItem = 49;
        for (var i = 0; i < limitItem; ++i) {
            w = 1 + 3 * Math.random() << 0;
            html += temp.replace(/\{width\}/g, w * 150).replace("{index}", i + 1);
        }
        $("#freewall").html(html);

        var wall = new Freewall("#freewall");
        wall.reset({
            selector: '.brick',
            animate: true,
            cellW: 150,
            cellH: 'auto',
            onResize: function () {
                wall.fitWidth();
            }
        });

        var images = wall.container.find('.brick');
        images.find('img').load(function () {
            wall.fitWidth();
        });

    </script>-->
    <div style="width: 20%; text-align: center">
        <a href="{{ route('photo.show', $photo->id) }}"><img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}"/></a>
    </div>
@endforeach
</div>
<script>
var wall = new Freewall("#wall");
        wall.reset({
            selector: 'img',
            animate: true,
            cellW: 200,
            cellH: 'auto',
            onResize: function () {
                wall.fitWidth();
            }
        });
</script>

@else
Pasde photos.
@endif

{{--Pagination--}}
<div style="text-align: center">
    {{ $photos->links() }}
</div>



@endsection