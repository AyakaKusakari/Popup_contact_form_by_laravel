@php
$title = 'お問い合わせ';
@endphp

@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center mt-2 mb-5">お問い合わせ</h1>
        <div class="container">
            <div class="form-group row">
                <p class="col-sm-4 col-form-label">お名前（全角10文字以内）<span class="badge badge-danger ml-1">必須</span></p>
                <div class="col-sm-8">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                    <p class="text-danger attention attention-name"></p>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
                <div class="col-sm-8">
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                    <p class="text-danger attention attention-email"></p>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-4 col-form-label">電話番号</p>
                <div class="col-sm-8">
                    {{ Form::text('tel', null, ['class' => 'form-control']) }}
                    <p class="text-danger attention attention-tel"></p>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-4 col-form-label">性別<span class="badge badge-danger ml-1">必須</span></p>
                <div class="col-sm-8">
                    <label>{{ Form::radio('gender', "男性") }}男性</label>
                    <label>{{ Form::radio('gender', "女性") }}女性</label>
                    <p class="text-danger attention attention-gender"></p>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-4 col-form-label">選択（複数選択可）<span class="badge badge-danger ml-1">必須</span></p>
                <div class="col-sm-8">
                    <label>{{ Form::checkbox('checkbox', "選択肢１") }}選択肢１</label>
                    <label>{{ Form::checkbox('checkbox', "選択肢２") }}選択肢２</label>
                    <label>{{ Form::checkbox('checkbox', "選択肢３") }}選択肢３</label>
                    <p class="text-danger attention attention-checkbox"></p>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-4 col-form-label">お問い合わせ内容<span class="badge badge-danger ml-1">必須</span></p>
                <div class="col-sm-8">
                    {{ Form::textarea('contents', null, ['class' => 'form-control']) }}
                    <p class="text-danger attention attention-contents"></p>
                </div>
            </div>
            
            <div class="text-center">
                <button type="button" class="btn btn-primary form-btn">
                    確認画面へ
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">確認画面</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => 'process', 'method' => 'POST']) !!}
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">お名前（10文字以内）<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-name"></p>
                                    <input class="modal-name" type="hidden" name="name" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-email"></p>
                                    <input class="modal-email" type="hidden" name="email" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">電話番号</p>
                                <div class="col-sm-8">
                                    <p class="modal-tel"></p>
                                    <input class="modal-tel" type="hidden" name="tel" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">性別<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-gender"></p>
                                    <input class="modal-gender" type="hidden" name="gender" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">選択（複数選択可）<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-checkbox"></p>
                                    <input class="modal-checkbox" type="hidden" name="checkbox" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">お問い合わせ内容<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-contents"></p>
                                    <input class="modal-contents" type="hidden" name="contents" value="">
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">修正する</button>
                                {{ Form::submit('送信', ['name' => 'submit', 'class' => 'btn btn-primary']) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection