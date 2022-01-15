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
            <span>У вас <span class="badge bg-danger" style="font-size: 13px;">нет</span> доступа, перейдите во вкладку "Update", чтобы получить его.</span>
        </div>
    @else
        <h4 class="mb-5 mt-3">Страничка если доступ ограничен.</h4>

        @if(\Illuminate\Support\Facades\Cookie::get('cookie_access') == 1)
            <div class="border d-inline-block p-4 rounded">
                <span>У вас <span class="badge bg-success" style="font-size: 13px;">есть</span> доступ, вы перешли на эту страничку при помощи меню.</span>
            </div>
        @else
            <div class="border d-inline-block p-4 rounded">
                <span>У вас <span class="badge bg-danger" style="font-size: 13px;">нет</span> доступа и вы перешли на страничку через меню выше.</span>
            </div>
        @endif
    @endif

@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let message = document.querySelector('div#alert-message');
                if (message) {
                    message.remove();
                }
            }, 1500)
        });
    </script>
@endsection
