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
        <div class="col-md-12 bg-light rounded">
            <div class="mt-3 ml-4">
                <a width="100" class="btn btn-primary" href="/"><i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i>На главную</a>
                <h1><?=$title?></h1>
            </div>
                <h3>Вы распознаны, как <?=$user['name']?></h3>


        </div>

    </div>
    <div class='hidden'
         data-userid='<?=$user['id']?>'
         data-email='<?=$user['email']?>'
    ></div>
    <?php include_once (ROOT . '/blocks/spec.php'); ?>
    <?if($dataSpecification):?>
    <input type="button" id="btn_download" class="float-right btn btn-primary" value="Скачать">
    <? endif;?>
</main>
<?php include_once (ROOT . '/blocks/footer.php'); ?>

<script src="/build/js/cabinet/page.js"></script>
</body>
</html>