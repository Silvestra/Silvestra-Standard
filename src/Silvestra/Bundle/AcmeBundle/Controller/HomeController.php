<?php

/*
 * This file is part of the Silvestra package.
 *
 * (c) Silvestra <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Silvestra\Bundle\AcmeBundle\Controller;

use Silvestra\Bundle\FrontendBundle\Controller\AbstractFrontendController;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/7/14 1:05 PM
 */
class HomeController extends AbstractFrontendController
{
    public function indexAction()
    {
        return $this->renderResponse('SilvestraAcmeBundle:Home:index.html.twig');
    }

    /**
     * {@inheritdoc}
     */
    protected function getName()
    {
        return 'silvestra_acme_home';
    }
}
