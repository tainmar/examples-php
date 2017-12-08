<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class OrderFromProviderWorkflow_v2 implements WorkflowInterface
{
    use Zenatonable;

    protected $item;
    protected $priceA;
    protected $priceB;
    protected $priceC;
    protected $priceD;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        list($this->priceA, $this->priceB, $this->priceC, $this->priceD) = parallel(
            new GetPriceFromProviderA($this->item, 2),
            new GetPriceFromProviderB($this->item, 2),
            new GetPriceFromProviderC($this->item, 2),
            new GetPriceFromProviderD($this->item, 2)
        )->execute();

        switch (array_keys(
            [$this->priceA, $this->priceB, $this->priceC, $this->priceD],
            min($this->priceA, $this->priceB, $this->priceC, $this->priceD)
        )[0]) {
            case 0:
                (new OrderFromProviderA($this->item, 2))->execute();
                break;
            case 1:
                (new OrderFromProviderB($this->item, 2))->execute();
                break;
            case 2:
                (new OrderFromProviderC($this->item, 2))->execute();
                break;
            case 3:
                (new OrderFromProviderD($this->item, 2))->execute();
                break;
        }
    }

    public function getId()
    {
        return $this->item['name'];
    }
}
