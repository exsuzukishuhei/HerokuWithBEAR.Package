<?php
/**
 * @package    Sandbox
 * @subpackage Resource
 */
namespace Sandbox\Resource\App\First\HyperMedia;

use BEAR\Resource\AbstractObject;
use BEAR\Sunday\Inject\ResourceInject;
use BEAR\Sunday\Inject\AInject;

/**
 * Greeting resource
 *
 * @package    Sandbox
 * @subpackage Resource
 */
class Shop extends AbstractObject
{
    use ResourceInject;
    use AInject;

    /**
     * @param string $item
     * @param string $card_no
     *
     * @return Shop
     */
    public function onPost($item, $card_no)
    {
        $order = $this
            ->resource
            ->post
            ->uri('app://self/first/hypermedia/order')
            ->withQuery(['item' => $item])
            ->eager
            ->request();

        $payment = $this->a->href('payment', $order);

        $this
            ->resource
            ->put
            ->uri($payment)
            ->withQuery(['card_no' => $card_no])
            ->request();

        $this->code = 204;
        return $this;
    }
}
