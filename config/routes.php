<?php
return array(
    //Все это можно получить из Базы данных путей
    '~(cat)\/(structural_section)\/(\d+)~'=>'${1}/${2}/OneElement/${3}',
    '~(cat)\/(sheet)\/(\d+)~'=>'${1}/${2}/OneElement/${3}',
    '~(cat)\/(cover)\/(\d+)~'=>'${1}/${2}/OneElement/${3}',
    '~(cat)\/(electrode)\/(\d+)~'=>'${1}/${2}/OneElement/${3}',
    '~(reg)\/(reg)\/(\d+)~'=>'${1}/${2}/View/${3}',


    '~(cat)\/(ajax_structural_section)~'=>'${1}/${2}/Ajax_structural_section',
    '~(cat)\/(ajax_sheet)~'=>'${1}/${2}/Ajax_sheet',
    '~(cat)\/(ajax_electrode)~'=>'${1}/${2}/Ajax_electrode',
    '~(cat)\/(ajax_cover)~'=>'${1}/${2}/Ajax_cover',

    '~(data)\/(remove_one)~'=>'${1}/${2}/RemoveOneElemFromSpecification',
    '~(data)\/(change_one)~'=>'${1}/${2}/ChangeOneElemInSpecification',

    '~(cat)\/(structural_section)~'=>'${1}/${2}/ListElements',
    '~(cat)\/(sheet)~'=>'${1}/${2}/ListElements',
    '~(cat)\/(electrode)~'=>'${1}/${2}/ListElements',
    '~(cat)\/(cover)~'=>'${1}/${2}/ListElements',


    '~(private)\/(cabinet)~'=>'${1}/${2}/Cabinet',
    '~(private)\/(admin)~'=>'${1}/${2}/Admin',
    '~(private)\/(add_one)~'=>'${1}/${2}/AddOne',
    '~(private)\/(remove_one)~'=>'${1}/${2}/RemoveOne',
    '~(private)\/(change_one)~'=>'${1}/${2}/ChangeOne',
    '~(private)\/(download)~'=>'${1}/${2}/Download',

    '~(user)\/(reg)~'=>'${1}/${2}/Register',
    '~(user)\/(login)~'=>'${1}/${2}/Login',
    '~(user)\/(logout)~'=>'${1}/${2}/Logout',
    '~(form)\/(message)~'=>'${1}/${2}/Send'




);