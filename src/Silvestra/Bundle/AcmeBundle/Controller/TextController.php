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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tadcka\Bundle\SitemapBundle\Model\NodeInterface;
use Tadcka\Bundle\TextNodeBundle\Model\TextNodeInterface;
use Tadcka\TextBundle\Model\TextTranslationInterface;
use Silvestra\Bundle\FrontendBundle\Controller\AbstractFrontendController;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/7/14 1:17 PM
 */
class TextController extends AbstractFrontendController
{
    public function indexAction(Request $request)
    {
        $textNode = $this->getTextNodeOr404($this->getPageNodeOr404($request));

        return $this->renderResponse(
            'SilvestraAcmeBundle:Text:index.html.twig',
            array('text' => $this->getTextOr404($textNode, $request->getLocale()))
        );
    }

    /**
     * Get text or 404 http status code.
     *
     * @param TextNodeInterface $textNode
     * @param string $locale
     *
     * @return TextTranslationInterface
     *
     * @throws NotFoundHttpException
     */
    private function getTextOr404(TextNodeInterface $textNode, $locale)
    {
        if (null !== $translation = $textNode->getText()->getTranslation($locale)) {
            return $translation;
        }

        throw new NotFoundHttpException('Not found text!');
    }

    /**
     * Get text node or 404 http status code.
     *
     * @param NodeInterface $node
     *
     * @return TextNodeInterface
     *
     * @throws NotFoundHttpException
     */
    private function getTextNodeOr404(NodeInterface $node)
    {
        $textNode = $this->container->get('tadcka_text_node.manager.text_node')->findTextNodeByNode($node);
        if (null === $textNode) {
            throw new NotFoundHttpException('Not found text node!');
        }

        return $textNode;
    }

    /**
     * {@inheritdoc}
     */
    protected function getName()
    {
        return 'silvestra_acme_text';
    }
}
