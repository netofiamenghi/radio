<?php

spl_autoload_register('carregarClasse');

function carregarClasse($nomeClasse)
{
    if (file_exists('../src/modelo/' . $nomeClasse . '.php')) :
        require_once '../src/modelo/' . $nomeClasse . '.php';
    elseif (file_exists('src/modelo/' . $nomeClasse . '.php')) :
        require_once 'src/modelo/' . $nomeClasse . '.php';
    elseif (file_exists('../src/util/' . $nomeClasse . '.php')) :
        require_once '../src/util/' . $nomeClasse . '.php';
    elseif (file_exists('src/util/' . $nomeClasse . '.php')) :
        require_once 'src/util/' . $nomeClasse . '.php';
    endif;
}
