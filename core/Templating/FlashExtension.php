<?php

namespace Core\Templating;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FlashExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('flashes', [$this, 'flashes']),
        ];
    }

    public function flashes($flashType)
    {
        if (isset($_SESSION['flash'][$flashType])) {
            $messages = $_SESSION['flash'][$flashType];
            unset($_SESSION['flash'][$flashType]);

            return $messages;
        }
    }
}