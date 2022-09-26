<?php

//  интерфейс для наблюдаемой вакансии
interface IObservable
{
    public function addObserver(IObserver $notes);
    public function removeObserver(IObserver $notes);
    public function notify();
}
