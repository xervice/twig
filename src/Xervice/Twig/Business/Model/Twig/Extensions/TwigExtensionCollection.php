<?php


namespace Xervice\Twig\Business\Model\Twig\Extensions;


use Xervice\Twig\Business\Dependency\Twig\Extensions\TwigExtensionInterface;

class TwigExtensionCollection implements \Iterator, \Countable
{
    /**
     * @var \Xervice\Twig\Business\Dependency\Twig\Extensions\TwigExtensionInterface[]
     */
    private $collection;

    /**
     * @var int
     */
    private $position;

    /**
     * Collection constructor.
     *
     * @param \Xervice\Twig\Business\Dependency\Twig\Extensions\TwigExtensionInterface[] $collection
     */
    public function __construct(array $collection)
    {
        foreach ($collection as $validator) {
            $this->add($validator);
        }
    }

    /**
     * @param \Xervice\Twig\Business\Dependency\Twig\Extensions\TwigExtensionInterface $validator
     */
    public function add(TwigExtensionInterface $validator): void
    {
        $this->collection[] = $validator;
    }

    /**
     * @return \Xervice\Twig\Business\Dependency\Twig\Extensions\TwigExtensionInterface
     */
    public function current(): TwigExtensionInterface
    {
        return $this->collection[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->collection[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->collection);
    }
}