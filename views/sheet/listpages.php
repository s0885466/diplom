<?php
$title = $data[0]['title_type'];
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
                <H1><?=$data[0]['title_type']?></H1>
            </div>


            <div class="album py-3 bg-light">
                <div class="container">
                    <div class="row">
                        <? foreach ($data as $key => $value):?>
                        <div class="col-md-6">
                            <div class="card mb-4 shadow-sm p-2">
                                <div class="card-header bg-primary text-white"><?=$value['title']?>
                                </div>
                                <img alt="<?=$value['title']?>" title="<?=$value['title']?>" class="img-fluid" style="max-height:200px" src="/<?=$value['img']?>">
                                <div class="card-body">
                                    <h3><?=$value['title']?></h3>
                                    <p class="card-text"><?=$value['short_description']?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="/<?=$value['link']?>">Перейти</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <? endforeach;?>

                    </div>
                </div>
            </div>

        </div>
        <?php include_once (ROOT . '/blocks/aside.php'); ?>
    </div>
    <?php include_once (ROOT . '/blocks/spec.php'); ?>
</main>
<?php include_once (ROOT . '/blocks/footer.php'); ?>
<script src="/build/js/list.js">
</script>
</body>
</html>