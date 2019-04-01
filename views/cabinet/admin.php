<?php
$title = 'Редактирование элементов';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once (ROOT . '/blocks/header.php'); ?>
</head>
<body>
<?php include_once (ROOT . '/blocks/nav.php'); ?>
<main class="container mt-5 mb-5" >
    <div class="row">
        <div class="col-md-15 bg-light rounded">
            <div class="mt-3 ml-4">
                <a width="100" class="btn btn-primary" href="/"><i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i>На главную</a>
                <h1><?=$title?></h1>
            </div>
            <div class="m-4">
                <h3>Добавить элемент</h3>
                <table class="table table-bordered " style="min-width: 600px">
                <thead class="thead-light">
                <tr>
                    <th>Обозначение</th>
                    <th>Тип</th>
                    <th>Масса</th>
                    <th>Примеч</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <td><input id="add_name" class="form-control" type="text" value=""></td>
                    <td><select id = "add_title" class="form-control">

                            <?php $option = []?>
                            <?php foreach ($dataAll as $key => $value){
                                if (!in_array($value['title'], $option)){
                                    echo "<option>{$value['title']}</option>";
                                }
                                $option[] = $value['title'];
                            }
                            ?>

                    </td>
                    <td><input id="add_mass" class="form-control" type="number" value="" step="0.01"></td>
                    <td><input id="add_note" class="form-control" type="text" value=""></td>
                    <td><input id="add_btn" type="button" class="btn btn-primary" value="добавить"></td>
                </tbody>
            </table>
            </div>

            <div class="m-4">
                <div class = "alert-primary" id="alert_ok">Элемент добавлен в спецификацию</div>
                <div class = "alert-danger" id="alert_warning"></div>
            </div>

            <div class="m-4">

            <h3>Редактировать элементы</h3>
            <div class="table-responsive" style="max-width: 100%; overflow: auto;">
            <table id="table-bd" class="table table-bordered table-hover ">
                <thead class="thead-light">
                <tr>
                    <th>N</th>
                    <th>ГОСТ</th>
                    <th>Обозначение</th>
                    <th>Тип</th>
                    <th>Материал</th>
                    <th>Масса</th>
                    <th>Примеч</th>
                    <th></th>
                    <th></th>
                </tr>

                </thead>
                <tbody>
                <? $number = 0 ?>
                <? foreach ($dataAll as $key => $value):?>
                <tr>
                    <td><?=++$number?></td>
                    <td><?=$value['gost']?></td>
                    <td><input class="form-control change_name" type="text" value="<?=$value['name']?>" data-change="<?=$value['id']?>"></td>
                    <td><?=$value['title']?></td>
                    <td><?=$value['material']?></td>
                    <td><input class="form-control change_weight" type="number" value="<?=$value['weight']?>" size="3" data-change="<?=$value['id']?>"></td>
                    <td><?=$value['note']?><!--<i class="fa fa-check fa-fw" data-change="<?/*=$value['id']*/?>"></i>--></td>
                    <td>
                        <input type="button" class="change_btn btn btn-primary" data-change="<?=$value['id']?>" value="изменить">
                    </td>
                    <td>
                        <input type="button" class="remove_btn btn btn-danger" data-remove="<?=$value['id']?>" value="удалить">
                    </td>
                </tr>

                <? endforeach;?>
                </tbody>
            </table>
            </div>
            </div>
        </div>
       <!-- --><?php /*include_once (ROOT . '/blocks/aside.php'); */?>
    </div>

</main>
<?php include_once (ROOT . '/blocks/footer.php'); ?>
<script src="/build/js/cabinet/admin.js">
</script>
</body>
</html>