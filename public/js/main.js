$('.form-btn').click(function() {

  const name     = $('input[name="name"]').val();
  const email    = $('input[name="email"]').val();
  const tel      = $('input[name="tel"]').val();
  const gender   = $('input[name="gender"]:checked').val();
  const checkbox = $('input[name="checkbox"]:checked').val();
  const contents = $('textarea[name="contents"]').val();
  const inputContents = contents.replace( /\r?\n/g, '<br />' );
  let error = false;

  $('.attention-name').text('');
  $('.attention-email').text('');
  $('.attention-tel').text('');
  $('.attention-gender').text('');
  $('.attention-checkbox').text('');
  $('.attention-contents').text('');

  // name
  // 全角
  if (!name.match(/^[^\x01-\x7E\xA1-\xDF]+$/)) {
    $('.attention-name').show().text('お名前は全角で入力してください。');
    error = true;
  }
  // 10文字以内
  if (name.length > 10) {
    $('.attention-name').show().text('お名前は10文字以内で入力してください。');
    error = true;
  }
  // 必須
  if (name == '' || name == null) {
    $('.attention-name').show().text('お名前は必須項目です。');
    error = true;
  }

  // email
  // 英数字のみ、@を含む
  if (!email.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
    $('.attention-email').show().text('メールアドレスは正しく入力してください。');
    error = true;
  }
  // 必須
  if (email == '' || email == null) {
    $('.attention-email').show().text('メールアドレスは必須項目です。');
    error = true;
  }

  // tel
  // 半角数字のみ（ハイフンOK）
  if (tel.length > 0) {
    if (!tel.match(/^[0-9\-]+$/)) {
      $('.attention-tel').show().text('電話番号は半角数字で入力してください。');
      error = true;
    }
  }

  // gender
  // 必須
  if (gender == '' || gender == null) {
    $('.attention-gender').show().text('性別は必須項目です。');
    error = true;
  }

  // checkbox
  // 必須
  if (checkbox == '' || checkbox == null) {
    $('.attention-checkbox').show().text('選択は必須項目です。');
    error = true;
  }

  // contents
  // 必須
  if (contents == '') {
    $('.attention-contents').show().text('お問い合わせ内容は必須項目です。');
    error = true;
  }

  if (error == false) {
    $('.form-btn').attr('data-toggle', 'modal');
    $('.form-btn').attr('data-target', '#exampleModalCenter');

    $('.modal-name').text(name).val(name);
    $('.modal-email').text(email).val(email);
    $('.modal-tel').text(tel).val(tel);
    $('.modal-gender').text(gender).val(gender);
    $('.modal-contents').html(inputContents).val(contents);
  }

  const inputCheckbox = [];
  $('input[name="checkbox"]:checked').each(function() {
    inputCheckbox.push($(this).val());
    $('.modal-checkbox').text(inputCheckbox).val(inputCheckbox);
  });
});
