<?php
class PriceCandle {
    private $open;
    private $high;
    private $low;
    private $close;

    public function __construct($open, $high, $low, $close) {
        $this->open = $open;
        $this->high = $high;
        $this->low = $low;
        $this->close = $close;
    }
}
?>