@extends('layouts.cookie')

@section('title')
    Обновление доступа
@endsection

@section('content')
    <div style="display: flex; justify-content: center; margin-top: 10%;">
        <div class="form-check p-5 border border-secondary rounded bg-light" style="min-width: 380px;">
            <input class="form-check-input" type="checkbox" id="access-checkbox">
            <label class="form-check-label" for="access-checkbox">
                Состояние доступа:
            </label>
            <span id="access-status"></span>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            checkCookieAccess();
            const checkBox = document.querySelector('input#access-checkbox');

            checkBox.addEventListener('change', changeCookieAccess)
        });

        async function changeCookieAccess(e) {
            e.preventDefault();
            let checkbox = document.querySelector('input#access-checkbox');
            checkbox.disabled = true;

            await fetch('/api/cookie/access/update', {
                method: 'POST'
            }).then(response => {
                    response.json()
                        .then(data => {
                            changeAccessStatus(data.cookie_access == 1);
                        });
                });
        }

        function checkCookieAccess() {
            let checkbox = document.querySelector('input#access-checkbox');
            checkbox.disabled = true;
            fetch('/api/cookie/access/')
                .then(response => {
                    response.json()
                        .then(data => {
                            changeAccessStatus(data.cookie_access == 1)
                        })
                });
        }

        function changeAccessStatus(isAccess) {
            let statusBox = document.querySelector('span#access-status');
            let checkbox = document.querySelector('input#access-checkbox');
            if (isAccess) {
                checkbox.checked = true;
                statusBox.textContent = 'Доступ получен!';
            } else {
                checkbox.checked = false;
                statusBox.textContent = 'Нет доступа.';
            }

            checkbox.disabled = false;
        }
    </script>
@endsection
