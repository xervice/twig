<?php


namespace Xervice\Twig\Business\Path;


class PathCollection implements \Iterator, \Countable
{
    /**
     * @var \Xervice\Twig\Business\Path\PathProviderInterface[]
     */
    private $collection;

    /**
     * @var int
     */
    private $position;

    /**
     * Collection constructor.
     *
     * @param \Xervice\Twig\Business\Path\PathProviderInterface[] $collection
     */
    public function __construct(array $collection)
    {
        foreach ($collection as $validator) {
            $this->add($validator);
        }
    }

    /**
     * @param \Xervice\Twig\Business\Path\PathProviderInterface $validator
     */
    public function add(PathProviderInterface $validator): void
    {
        $this->collection[] = $validator;
    }

    /**
     * @return \Xervice\Twig\Business\Path\PathProviderInterface
     */
    public function current(): PathProviderInterface
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