<?php


namespace yesai\interfaces;


use app\Request;

interface MiddlewareInterface
{
    public function handle(Request $request, \Closure $next);
}