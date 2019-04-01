<?php
$title = $data['title'];
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
                <a class="btn btn-primary" href="./"><i class="mr-1 fa fa-arrow-circle-left" aria-hidden="true"></i>Назад к списку</a>
                <H1><?=$data['title']?></H1>
            </div>
            <div class="album py-3 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 shadow-sm">
                                <img alt="<?=$data['title']?>" title="<?=$data['title']?>" class="img-thumbnail" height="200" src="/<?=$data['img']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 shadow-sm">
                                <div class="m-3">
                                    <h1 class="h3 mb-3 font-weight-normal">Введите данные</h1>
                                    <form>
                                        <div class="form-group row">
                                            <label for="choose" class="col-sm-4 col-form-label">Тип:</label>
                                            <span class="col-sm-8">
                                                  <select id="name" class="form-control">
                                                    <option selected>Выбрать</option>
                                                      <?php foreach($dataElem as $key => $value):?>
                                                          <option data-id="<?=$value['id']?>"><?=$value['name']?></option>
                                                      <? endforeach;?>
                                                  </select>
                                            </span>
                                        </div>
                                        <div class="form-group row">
                                            <label for="length" class="col-sm-4 col-form-label">Длина:</label>
                                            <span class="col-sm-6">
                                                <input id="amount" type="number" class="form-control" placeholder="Длина" step="0.1">
                                            </span>
                                            <span class="pl-3">м</span>
                                        </div>


                                        <div class = "alert-primary" id="alert_ok">Элемент добавлен в спецификацию</div>
                                        <div class = "alert-danger" id="alert_warning"></div>



                                        <div>
                                            <input id="btn_send" type="button" class="btn btn-primary btn btn-block" value="Добавить">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="p-2 ml-3 mr-3 bg-white rounded">
                <?=$data['short_description']?>
            </div>
        </div>
        <div class='hidden'
             data-currentid='<?=$data['id'] ?>'
             data-catid='<?=$dataElem[0]['cat_id']?>'
        ></div>
        <?php include_once (ROOT . '/blocks/aside.php'); ?>
    </div>
    <?php include_once (ROOT . '/blocks/spec.php'); ?>
</main>
<?php include_once (ROOT . '/blocks/footer.php'); ?>
<script src="/build/js/menu.js"></script>
<script src="/build/js/structural_section/page.js"></script>
</body>
</html>