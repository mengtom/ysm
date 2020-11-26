<?php


namespace yesai\interfaces;


interface ListenerInterface
{
    public function handle($event): void;
}