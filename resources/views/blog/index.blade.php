<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <div class="overflow-x-auto">
    <table class="table-auto w-full">
      <thead>
        <tr class="bg-gray-200">
          <th class="px-4 py-2 text-left">ID</th>
          <th class="px-4 py-2 text-left">Title</th>
          <th class="px-4 py-2 text-left">Excerpt</th>
          <th class="px-4 py-2 text-left">Body</th>
          <th class="px-4 py-2 text-left">Image Path</th>
          <th class="px-4 py-2 text-left">Is Published</th>
          <th class="px-4 py-2 text-left">Minute to Read</th>
          <th class="px-4 py-2 text-left">Create Time</th>
          <th class="px-4 py-2 text-left">Update Time</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($datas); $i++)
          @if ($i % 2 == 0)
            <tr class="bg-white">
            @else
            <tr class="bg-gray-100">
          @endif
          @foreach ($datas[$i] as $value)
            <td class="border px-4 py-2">{{ $value }}</td>
          @endforeach
          </tr>
        @endfor
      </tbody>
    </table>
  </div>
</body>

</html>
