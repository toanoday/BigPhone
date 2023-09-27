<?php
function currency_format($number){
    return number_format($number, 0, '', '.').' đ';
}