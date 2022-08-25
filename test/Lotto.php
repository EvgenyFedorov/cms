<?php

namespace test;

class Lotto
{

    private $length = 6;
    private $first = 0;
    private $end = 0;
    private $error = false;
    private $error_message = null;

    public function __construct()
    {
        $this->setGets();
        if($this->error === false && $this->checkLengths() === true){
            print_r($this->error_message);
            exit();
        }
    }

    public function getTickets(){

        for($i = $this->first; $i <= $this->end; $i++){

            if($result = $this->checkJust($i)){
                print 'Happy ticket: ' . $i . '<br>';
            }else{
                print 'Just ticket: ' . $i . '<br>';
            }

        }

    }

    // Чекаем "Счастливые билеты"
    private function checkJust($number){

        $group[1] = $this->getSymbol($number,0, 1) + $this->getSymbol($number,1, 1) + $this->getSymbol($number,2, 1);
        $group[2] = $this->getSymbol($number,3, 1) + $this->getSymbol($number,4, 1) + $this->getSymbol($number,5, 1);

        if(strlen($group[1]) > 1)
        {
            $group[1] = $this->sumGroup($group[1]);
        }

        if(strlen($group[2]) > 1)
        {
            $group[2] = $this->sumGroup($group[2]);
        }

        if($group[1] === $group[2]){
            return $number;
        }else{
            return false;
        }

    }

    // Повторно складываем двоичные числа
    private function sumGroup($string)
    {
        $result = 0;

        for($i = 0; $i <= strlen($string); $i++){

            $result = ($result + $this->getSymbol($string, $i, 1));

        }

        return $result;
    }

    // Получаем символ в строке
    private function getSymbol($symbol, $start_position, $length)
    {
        return substr($symbol, $start_position, $length);
    }

    // чекаем длинну строк параметров
    private function checkLengths()
    {
        if($this->getLength($this->first) !== $this->length)
        {
            $this->error = true;
            $this->error_message[] = 'GET first length 6';
        }
        if($this->getLength($this->end) !== $this->length)
        {
            $this->error = true;
            $this->error_message[] = 'GET end length 6';
        }
        return $this->error;
    }

    // получаем длинну строки
    private function getLength($string)
    {
        return strlen($string);
    }

    // сетим гет параметры
    private function setGets()
    {
        $this->setFirst();
        $this->setEnd();
    }

    // Сетим first / пишем ошибку
    private function setFirst()
    {
        if(!$first = $this->isGet('first'))
        {
            $this->error = true;
            $this->error_message[] = 'GET first empty';
        }else{
            $this->first = $first;
        }
    }

    // Сетим end / пишем ошибку
    private function setEnd()
    {
        if(!$end = $this->isGet('end'))
        {
            $this->error = true;
            $this->error_message[] = 'GET end empty';
        }else{
            $this->end = $end;
        }
    }

    // Чекаем ключи
    private function isGet($key)
    {
        return (isset($_GET[$key]) && !empty($_GET[$key])) ? $_GET[$key] : false;
    }

}

$loto = new Lotto();
$loto->getTickets();