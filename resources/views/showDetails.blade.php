<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
</head>
<body>
     title: {{  $car->cartitle }}
    <br>
     Description: {{ $car->desciption}}

    <br>
Category: {{ $car->category->categoryName}}
<br>
<br>
image:
    <img src="{{asset('assets/images/'.$car->image)}}" alt="cars" style="width:150px;">

<br>
</body>
</html>
