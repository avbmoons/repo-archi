<?php

//  интерфейс наблюдателя для отслеживания вакансии
interface IObserver
{
    public function handle(string $point);
}
