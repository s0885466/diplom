<?php if(UserModel::isGuest()){
    //ЭТО КОСТЫЛЬ НА МОЙ ВЗГЛЯД - нарушение MVC паттерна
    if(!$dataSpecification){
        $dataSpecification = ParentModel::getSpecificationFromSession();
    }

}

?>
<div id = "specification" class="table-responsive" style="max-width: 100%; overflow: auto;">
    <h2 class=" text-center font-weight-normal">Спецификация</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col" rowspan="2">Поз.</th>
            <th scope="col" rowspan="2">Обозначение</th>
            <th scope="col" rowspan="2">Наименование</th>
            <th scope="col" rowspan="2">Количество</th>
            <th scope="col" rowspan="2">Материал</th>
            <th scope="col" colspan="2">Масса, кг</th>
            <th scope="col" rowspan="2">Примечание</th>
            <th scope="col" rowspan="2"></th>
            <th scope="col" rowspan="2"></th>
        </tr>
        <tr>
            <th scope="col" colspan="1">ед.</th>
            <th scope="col" colspan="1">общ.</th>
        </tr>
        </thead>
        <tbody>
        <?php $number = 0;
        $sum = 0;
        ?>
        <?php if($dataSpecification):?>
        <?php foreach($dataSpecification as $key=>$value): ?>
        <tr class="row_data" data-id="<?=($value['id'])?:$number?>">
            <?php $sum+= $value['all_weight']?>
            <td><?=++$number;?></td>
            <td><?=$value['gost']?></td>
            <td class="el_name" data-name="<?=($value['id'])? $value['id'] : $number - 1?>"
            ><?=$value['name']?></td>
            <td>
                <input class="form-control el_amount" type="number" step="0.1"
                       value="<?=$value['amount']?>"
                       data-amount="<?=($value['id'])? $value['id'] : $number - 1?>">
            </td>
            <td><?=$value['material']?></td>
            <td><?=round($value['weight'],2)?></td>
            <td><?=round($value['all_weight'],1)?></td>
            <td><?=$value['note']?></td>
            <td>
                <input style="opacity:0 " type="button" class="change_btn btn btn-primary" disabled
                       data-change="<?=($value['id'])? $value['id'] : $number - 1?>"
                       value="изменить">

            </td>
            <td>
                <input type="button" class="remove_btn btn btn-danger"
                       data-remove="<?=($value['id'])? $value['id'] : $number - 1?>"
                       value="удалить">
            </td>

        </tr>
        <?php endforeach;?>
        <?php endif;?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Итого:</td>
            <td><?=round($sum,1) ?></td>
            <td>кг</td>
            <td></td>
            <td></td>
        </tr>

        </tbody>
    </table>
    <?/*=var_dump($dataSpecification)*/?>
</div>
<script src="/build/js/blocks/spec.js"></script>
<script>
    $( document ).ready(function () {
        <?php if (!$dataSpecification) echo "$('#specification').hide();"?>
    });
</script>

