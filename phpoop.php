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

    public function getOpen() {
        return $this->open;
    }

    public function getHigh() {
        return $this->high;
    }

    public function getLow() {
        return $this->low;
    }

    public function getClose() {
        return $this->close;
    }

    public function setOpen($open) {
        $this->open = $open;
    }

    public function setHigh($high) {
        $this->high = $high;
    }

    public function setLow($low) {
        $this->low = $low;
    }

    public function setClose($close) {
        $this->close = $close;
    }
}
?>