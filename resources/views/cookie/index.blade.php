@extends('layouts.cookie')

@section('content')
    <h4 class="mb-5 mt-3">Самый надёжный способ ограничить доступ</h4>
    <div class="border d-inline-block p-4 rounded">
        <div class="list-group">
            <div class="mb-3">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">- Update</h5>
                </div>
                <p class="mb-1">получение доступа</p>
            </div>
            <div class="mb-3">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">- Success access</h5>
                </div>
                <p class="mb-1">проверка доступа</p>
            </div>
            <div class="mb-3">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">- Failed access</h5>
                </div>
                <p class="mb-1">страничка на которую редиректит если нет доступа</p>
            </div>
        </div>
    </div>
@endsection
