<?php

//  класс для отправки сообщения
interface ISendnotes
{
    public function sender(): string;
}

//  класс отправки сообщения, расширяет абстрактный ISendnotes
class NotesSender implements ISendnotes
{
    protected $address;
    protected $subject;
    protected $message;
    public function __construct(string $address, string $subject, string $message)
    {
        $this->address = $address;
        $this->subject = $subject;
        $this->message = $message;
    }
    public function sender(): string
    {
        return mail($this->address, $this->subject, $this->message);
    }
}

//  декораторы для отправки сообщений Email и Sms
abstract class Decorator implements ISendnotes
{
    protected $note = null;
    public function __construct(ISendnotes $note)
    {
        $this->note = $note;
    }
}

class NoteSMS extends Decorator
{
    public string $phone;
    public string $domane;

    public function sender(): string
    {
        return $this->note->sender();
    }
}
class NoteEmail extends Decorator
{
    public function sender(): string
    {
        return $this->note->sender();
    }
}

//  вызов декоратора для отправки сообщений
function testDecorator(string $address, string $subject, string $message)
{
    $notesSender =
        new NoteSMS(
            new NoteEmail(
                new NotesSender(
                    $address,
                    $subject,
                    $message
                )
            )
        );
    $notesSender->sender();
}
