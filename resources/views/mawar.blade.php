<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Mawar</h1>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi aut culpa voluptate molestiae nulla distinctio
        natus expedita. Amet ullam possimus maxime repudiandae quis recusandae unde, eaque sed nobis odit voluptate
        culpa sequi praesentium cumque, nihil error optio. Dolorum sint earum, rem eum commodi cum aliquid dicta sunt
        soluta qui quasi possimus quam, odit esse culpa obcaecati sapiente labore corrupti velit voluptas consequatur.
        Sunt nobis quisquam exercitationem optio deleniti, vel dolores blanditiis, adipisci at eius natus aliquid
        molestias aperiam. Et ex provident quidem molestias aperiam voluptatibus nemo dignissimos corrupti veniam
        obcaecati architecto itaque libero totam facere magni eligendi molestiae, expedita at.</p>
    <table border="2">
<tr>
    <th>Name</th>
    <th>Price</th>
    <th>Category</th>
    <th>Description</th>
    <th>Jawa</th>
</tr>
    @foreach ($bebek as $ror)
        <tr>
            <td>{{ $ror->name }}</td>
            <td>{{ $ror->price }}</td>
            <td>{{ $ror->category }}</td>
            <td>{{ $ror->description }}</td>
        </tr>
    @endforeach
    </table>
<p>{{ $bebek }}</p>
</body>

</html>