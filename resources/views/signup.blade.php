<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style>
      @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

      body {
        font-family: 'Open Sans', sans-serif;
        background: #f9faff;
        color: #3a3c47;
        line-height: 1.6;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 100px;
      }

      h1 {
        margin-top: 48px;
      }

      form {
        background: #fff;
        max-width: 360px;
        width: 100%;
        padding: 58px 44px;
        border: 1px solid ##e1e2f0;
        border-radius: 4px;
        box-shadow: 0 0 5px 0 rgba(42, 45, 48, 0.12);
        transition: all 0.3s ease;
      }

      .row {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
      }

      .row label {
        font-size: 13px;
        color: #8086a9;
      }

      .row input {
        flex: 1;
        padding: 13px;
        border: 1px solid #d6d8e6;
        border-radius: 4px;
        font-size: 16px;
        transition: all 0.2s ease-out;
      }

      .row input:focus {
        outline: none;
        box-shadow: inset 2px 2px 5px 0 rgba(42, 45, 48, 0.12);
      }

      .row input::placeholder {
        color: #C8CDDF;
      }

      button {
        width: 100%;
        padding: 12px;
        font-size: 18px;
        background: #DE5542;
        color: #fff;
        border: none;
        border-radius: 100px;
        cursor: pointer;
        font-family: 'Open Sans', sans-serif;
        margin-top: 15px;
        margin-bottom: 20px;
        transition: background 0.2s ease-out;
      }

      button:hover {
        background: #E1444D;
      }

      @media(max-width: 458px) {
        
        body {
          margin: 0 18px;
        }
        
        form {
          background: #f9faff;
          border: none;
          box-shadow: none;
          padding: 20px 0;
        }

      }

      form a {
        color: #3A3C47;
        padding: 0 0 0 120px;
        text-decoration: none;

      }
  </style>
</head>
<body>

<h1>Войти</h1>
<form>
  <div class="row">
    <label for="email">Email</label>
    <input type="email" name="email" autocomplete="off" placeholder="Email">
  </div>
  <div class="row">
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Пароль">
  </div>
    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
    <label style="" class="form-check-label" for="autoSizingCheck">
     <!--Запомнить меня-->
    </label>
    <a href="registration.html" style="float: right;">Регистратция</a>
  <button type="submit">Войти</button>
  <a href="####">Забыл пароль?</a>
</form>

</body>
</html>