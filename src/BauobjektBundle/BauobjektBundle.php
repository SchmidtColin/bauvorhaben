<?php

namespace BauobjektBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BauobjektBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
