<style>
    #fix-bottom{
        position: fixed;
        bottom: 0;
        opacity: 0.5;
    }
    #alert_ok{
        display: none
    }

</style>

<div class="navigation d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
    <a class ="my-0 mr-md-auto btn btn-outline-primary mt-2 mb-2 mr-2" href="/">На главную</a>



    <? if(UserModel::isGuest()):?>
    <a class="btn btn-outline-primary mt-2 mb-2 mr-2" href="/user/login">Вход</a>
        <a class="btn btn-outline-primary mt-2 mb-2 mr-2" href="/user/reg">Регистрация</a>
    <? else:?>
    <a class="btn btn-outline-primary mt-2 mb-2 mr-2" href="/private/cabinet">Аккаунт</a>
    <a class="btn btn-outline-primary mt-2 mb-2 mr-2" href="/user/logout">Выход</a>
    <? endif;?>
</div>