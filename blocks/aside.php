<div class="col-md-4">
    <div class="p-3 mb-3 bg-light rounded">
        <?php $var =$dataSidebar[0]['name_type']; ?>
        <ul class="list-group mb-2"><a class="text-dark" href="<?='/'.$dataSidebar[0]['link_type']?>"><h4><?=$var?></h4></a>
       <?php
       foreach ($dataSidebar as $key=>$value){
           if($var!=$value['name_type']){
               $var=$value['name_type'];
               echo "</ul><ul class=\"list-group mb-2\"><a class='text-dark' 
href='/{$value['link_type']}'><h4>{$var}</h4></a>";
           }
           echo "<li class='list-group-item list-group-item-action' data-li='{$value['id']}'>
<a class='text-secondary' href='/{$value['link']}'>{$value['title']}</a></li>";
       }


       ?>
    </div>
    <div class="p-3 mb-3 bg-light  rounded">
        <form>
            <h4>Напишите нам</h4>

            <input name = "send_name" type="text" class="form-control" id="send_name" placeholder="Ваша имя">
            <input name = "send_email" type="email" class="form-control mt-3" id="send_email" placeholder="Ваша почта">
            <textarea name = "text_message" id="text_message" class="form-control mt-3" rows="5" placeholder="Ваше сообщение"></textarea>
        </form>
        <div class = "alert-primary" id="alert_success">Сообщение успешно отправлено</div>
        <div class = "alert-danger" id="alert_foul"></div>
        <button type="submit" id="send_message" name = "send_message" class="btn btn-primary btn-lg mt-3">Отправить</button>

    </div>

<script src="/build/js/blocks/aside.js">
</script>

</div>
