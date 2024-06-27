<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Custom Invoice Creator')</title>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="bg-[#FEFEFF] min-h-svh">
      <div class="col-md-12">
        @include('components.header')
        <main>
          <div class="flex flex-col md:flex-row">
            <div class="flex-[20%] p-2">
              @include('components.menumain')
            </div>
            <div class="flex-[80%] p-5 bg-[#F2F5FE] rounded-lg p-2 m-2 min-h-[80vh]">
              @yield('konten')
            </div>
          </div>
        </main>
      </div>
    </div>    
  </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $('#menu-profile-option').click(function () { 
    $('#menu-profile').toggleClass('hidden');
  });

  function toggleMenu(menuId) {
      $('#' + menuId).toggleClass('hidden');
      $('#' + menuId + '-dropdown').toggleClass('hidden');
  }
</script>
</html>