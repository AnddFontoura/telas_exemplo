<?php

    function form(array $params)
    {
        echo 
        "
        <div class='mb-3 row'>
            <label for='{$params['id']}' class='col-sm-2 col-form-label'>{$params['labelName']}</label>
            <div class='col-sm-10'>
                <input type='{$params['type']}' name='{$params['name']}' class='form-control' id='{$params['id']}'></input>
            </div>
        </div>
        ";
    }

?>