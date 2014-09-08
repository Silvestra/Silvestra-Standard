<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),

            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new Nercury\TranslationEditorBundle\NercuryTranslationEditorBundle(),
            new Trsteel\CkeditorBundle\TrsteelCkeditorBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new FM\ElfinderBundle\FMElfinderBundle(),

            new Tadcka\Bundle\RoutingBundle\TadckaRoutingBundle(),
            new Tadcka\Bundle\SitemapBundle\TadckaSitemapBundle(),
            new Tadcka\TextBundle\TadckaTextBundle(),

            new Silvestra\Bundle\AdminBundle\SilvestraAdminBundle(),
            new Silvestra\Bundle\Admin\UserBundle\SilvestraAdminUserBundle(),
            new Silvestra\Bundle\FrontendBundle\SilvestraFrontendBundle(),
            new Silvestra\Bundle\SandboxBundle\SilvestraSandboxBundle(),
            new Silvestra\Bundle\TextNodeBundle\SilvestraTextNodeBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Tadcka\Bundle\GeneratorBundle\TadckaGeneratorBundle();
            $bundles[] = new Silvestra\Bundle\AcmeBundle\SilvestraAcmeBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
