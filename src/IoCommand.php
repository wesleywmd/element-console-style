<?php
namespace Wesleywmd\Element\ConsoleStyle;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IoCommand extends Command
{
    /** @var  \Wesleywmd\Element\ConsoleStyle\Io */
    protected $io;

    /** @var \Wesleywmd\Element\ConsoleStyle\IoFactory  */
    protected $ioFactory;

    /** @var string */
    protected $title;

    public function __construct(IoFactory $ioFactory)
    {
        parent::__construct("default_io_command");
        $this->ioFactory = $ioFactory;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    protected function addArguments($array)
    {
        array_walk($array, [$this, 'addArrayArgument']);
    }

    protected function addArrayArgument($arg)
    {
        $default = (isset($arg[3])) ? $arg[3] : null;
        $this->addArgument($arg[0], $arg[1], $arg[2], $default);
    }

    protected function addOptions($array)
    {
        array_walk($array, [$this, 'addArrayOption']);
    }

    protected function addArrayOption($arg)
    {
        $default = (isset($arg[4])) ? $arg[4] : null;
        $this->addOption($arg[0], $arg[1], $arg[2], $arg[3], $default);
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->io = $this->ioFactory->create($input, $output);
        if( !empty($this->title) ) {
            $this->io->title($this->title);
        }
    }
}