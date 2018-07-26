<?php
namespace Wesleywmd\Element\ConsoleStyle;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Io
 * @package Wesleywmd\Element\ConsoleStyle
 * @author Wesley Guthrie
 * @email therealwesleywmd@gmail.com
 */
class IoFactory
{
    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Wesleywmd\Element\ConsoleStyle\Io
     */
    public function create(InputInterface $input, OutputInterface $output)
    {
        return new Io($input,$output);
    }
}