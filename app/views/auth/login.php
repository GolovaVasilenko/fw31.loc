<?php
if(vendor\core\Session::getValue('error')){
    $error = vendor\core\Session::getValue('error');
    vendor\core\Session::sessionRemove('error');
}
?>

<div class="panel panel-default">
    <div class="panel-heading"><h2>Авторизация пользователя</h2></div>
    <div class="panel-body">
        <?php if(!empty($error)):?>
            <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
        <?php endif;?>
        <form class="formAuth" action="/login" method="post">
            <input class="form-control" name="login" type="text" placeholder="Логин*">
            <input class="form-control" name="password" type="password" placeholder="Пароль*">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="1"> Запомнить меня
                </label>
                <span><a href="/registration">Регистрация</a></span>
            </div>
            <p>Поля отмеченные звездочкой обязательны к заполнению</p>
            <input class="btn btn-primary" name="loginUser" type="submit" value="Войти">
        </form>

    </div>
</div>