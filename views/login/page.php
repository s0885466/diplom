<?php
$title = 'Личный кабинет';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once (ROOT . '/blocks/header.php'); ?>
</head>
<body>
<?php include_once (ROOT . '/blocks/nav.php'); ?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8 bg-light rounded">
            <div class="mt-3 ml-4">
                <a width="100" class="btn btn-primary" href="/"><i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i>На главную</a>
                <H1><?=$title?></H1>
            </div>
            <form method="post" action="" class="m-4 col-6">
                <? if($result!=false):?>
                    <div class="alert alert-primary" role="alert">Вы зарегистрированы</div>
                <? else: ?>
                <div>
                    <? if($errors!=false):?>
                        <? foreach ($errors as $error) :?>
                            <div class="alert alert-danger" role="alert"><?=$error?></div>
                        <? endforeach;?>
                    <? endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input name="email" value="<?=$email?>" type="email" class="form-control" id="email"  placeholder="Введите почту">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input name="password" value="<?=$password?>" type="password" class="form-control" id="password" placeholder="Введите пароль">
                    <small class="form-text text-muted">Пароль должен быть не менее 5 символов</small>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Войти</button>
                <? endif; ?>
            </form>






        </div>
        <?php include_once (ROOT . '/blocks/aside.php'); ?>
    </div>
    <?php include_once (ROOT . '/blocks/spec.php'); ?>
</main>
<?php include_once (ROOT . '/blocks/footer.php'); ?>

</body>
</html>