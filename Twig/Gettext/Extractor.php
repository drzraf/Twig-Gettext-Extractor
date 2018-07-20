<?php

/**
 * This file is part of the Twig Gettext utility.
 *
 *  (c) Saša Stamenković <umpirsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twig\Gettext;

use Symfony\Component\Filesystem\Filesystem;

/**
 * Extracts translations from twig templates.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class Extractor
{
    /**
     * @var \Twig_Environment
     */
    protected $environment;

    /**
     * Gettext parameters.
     *
     * @var string[]
     */
    protected $parameters;


    private $executable;

    public function __construct(\Twig_Environment $environment)
    {
        $this->environment = $environment;
        $this->reset();
    }

    /**
     * @param mixed $executable
     */
    public function setExecutable($executable)
    {
        $this->executable = $executable;
    }

    protected function reset()
    {
        $this->parameters = [];
    }

    public function addTemplate($path)
    {
        $this->environment->loadTemplate($path);
        if ($this->environment->isDebug()) {
            fprintf(STDERR, $path . PHP_EOL);
        }
    }

    public function addGettextParameter($parameter)
    {
        $this->parameters[] = $parameter;
    }

    public function setGettextParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function extract()
    {
        $command = $this->executable ?: 'xgettext';
        $command .= ' ' . implode(' ', $this->parameters);
        $command .= ' ' . $this->environment->getCache() . '/*/*.php';

        $error = 0;
        if ($this->environment->isDebug()) {
            fprintf(STDERR, $command . PHP_EOL);
        }

        $output = system($command, $error);
        if (0 !== $error) {
            throw new \RuntimeException(sprintf(
                'Gettext command "%s" failed with error code %s and output: %s',
                $command,
                $error,
                $output
            ));
        }

        $this->reset();
    }

    public function __destruct()
    {
        $filesystem = new Filesystem();
        if (! $this->environment->isDebug()) {
            $filesystem->remove($this->environment->getCache());
        }
    }
}
