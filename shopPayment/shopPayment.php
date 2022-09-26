<?php

require_once "./IPayer.php";
require_once "./Payments.php";

//  Создаём три стратегии для оплаты
class QiwiPayer implements IPayer
{
    public function payApp(array $props)
    {
        echo 'Оплата по Qiwi';
    }
}

class YandexPayer implements IPayer
{
    public function payApp(array $props)
    {
        echo 'Оплата по Yandex';
    }
}

class WebMoneyPayer implements IPayer
{
    public function payApp(array $props)
    {
        echo 'Оплата по WebMoney';
    }
}

//  Создаём объект, в который внедряем стратегию оплаты
class PaymentsCollection
{
    public function pay(IPayer $payer, array $props): array
    {
        echo 'Некоторая бизнес-логика';
        return $payer->payApp($props);
    }
}

//  Пример использования
function testPaymentStrategy(array $props)
{
    $payment = new PaymentsCollection();
    // оплатa по Qiwi
    $elements = $payment->pay(new QiwiPayer(), $props);
    // оплатa по Yandex
    $elements = $payment->pay(new YandexPayer(), $props);
    // оплатa по WebMoney
    $elements = $payment->pay(new WebMoneyPayer(), $props);
}
