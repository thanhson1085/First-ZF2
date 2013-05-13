<?php
namespace Dis\Model;

class Dis
{
    public $id;
    public $artist;
    public $title;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->time = (isset($data['time'])) ? $data['time'] : null;
        $this->error  = (isset($data['error'])) ? $data['error'] : null;
        $this->message  = (isset($data['message'])) ? $data['message'] : null;
    }
}
