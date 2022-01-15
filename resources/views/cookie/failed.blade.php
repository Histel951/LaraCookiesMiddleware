@extends('layouts.cookie')

@section('content')
    @if(session('error'))
        <h4 class="mb-5 mt-3">Нет Доступа!</h4>

        <div class="alert alert-danger" id="alert-message"
             style="position: absolute;
              z-index: 9999;
               top: 20%;
                left: 50%;" role="alert">
            {{ session('error') }}
        </div>

        <div class="border d-inline-block p-4 rounded">
            <span>У вас нет доступа, перейдите во вкладку "Update" чтобы получить его.</span>
        </div>
    @else
        <h4 class="mb-5 mt-3">Страничка если доступ ограничен.</h4>

        @if(\Illuminate\Support\Facades\Cookie::get('cookie_access') === 'y')
            <div class="border d-inline-block p-4 rounded">
                <span>У вас есть доступ, вы перешли на эту страничку через меню в хэдере.</span>
            </div>
        @else
            <div class="border d-inline-block p-4 rounded">
                <span>У вас нет доступа и вы перешли на эту страничку через меню в хэдере.</span>
            </div>
        @endif
    @endif

@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.querySelector('div#alert-message').remove();
            }, 1500)
        });
    </script>
@endsection
