<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">

    <title>HELLO</title>
</head>

<body>


    @foreach ($content as $item)

    <h1><a href={{"post/$item->slug"}}> {!!$item->title!!} </a></h1>

    <h4><a href="/category/{{$item -> category -> slug}}">{!!$item->category->name!!}</a></h4>

    <p>{!!$item->body!!}</p>

@endforeach
        



</body>

</html>
