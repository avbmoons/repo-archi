<?php

require_once "./IObserver.php";
require_once "./IObservable.php";

//  наблюдатель для отслеживания вакансии
class PointsObserver implements IObserver
{
    public function handle(string $point)
    {
        echo 'Находим вакансию';
    }
}

//  наблюдаемый класс вакансий
class Points implements IObservable
{
    protected $point;
    protected $notes;
    public function getPoint()
    {
        return $this->point;
    }
    public function setPoint(string $point)
    {
        $this->point = $point;
    }
    public function addObserver(IObserver $notes)
    {
        $this->notes[] = $notes;
    }
    public function removeObserver(IObserver $notes)
    {
        foreach ($this->notes as &$nots) {
            if ($nots === $notes) {
                unset($nots);
            }
        }
    }
    public function notify()
    {
        foreach ($this->notes as $note) {
            $note->handle($this->point);
        }
    }
}

//  класс искателей вакаисий
class Hunter
{
    protected $name;
    protected $email;
    protected $experience;
    protected $point;
    protected $notes;
    public function __construct(Points $notes)
    {
        $this->notes = $notes;
    }
    public function setPoint(string $point)
    {
        $this->point = $point;
    }
    public function getPoint(): string
    {
        return $this->point;
    }
    public function getNote(): Points
    {
        return $this->notes;
    }
    public function removeNote(): Points
    {
        return $this->notes;
    }
}

//  пример использования
function testNotifier()
{
    $note = new PointsObserver();
    $news = new Points();
    $news->addObserver($note);
    $news->setPoint('Test test test');
    $news->notify();
}
