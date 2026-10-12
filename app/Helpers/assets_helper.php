<?php

if(!function_exists('img_url')){
    function img_url(string $nom): string
    {
        return base_url() . '/public/assets/images/' . $nom;
    }
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

