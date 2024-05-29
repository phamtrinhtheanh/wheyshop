<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Load Json</title>
</head>

<body>
    <h1>Product Attributes</h1>
    @foreach ($products as $product)
    <h2>{{ $product->name }}</h2>
    <ul>
        @php
            $attributes = json_decode($product->attributes, true);
        @endphp
        @if (is_array($attributes))
            @foreach ($attributes as $attribute => $values)
                <li>{{ $attribute }}:
                    <ul>
                        @if (is_array($values))
                            @foreach ($values as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        @else
                            <li>{{ $values }}</li>
                        @endif
                    </ul>
                </li>
            @endforeach
        @else
            <li>{{ $attributes }}</li>
        @endif
    </ul>
@endforeach
</body>

</html>
