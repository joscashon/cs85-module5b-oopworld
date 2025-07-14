<?php
class PriceCandle {
    private $open; // Opening price of the candle
    private $high; // Highest price of the candle
    private $low;  // Lowest price of the candle
    private $close; // Closing price of the candle

    // Constructor to initialize the candle with open, high, low, and close prices
    public function __construct($open, $high, $low, $close) {
        $this->open = $open;
        $this->high = $high;
        $this->low = $low;
        $this->close = $close;
    }

    // Getters and setters for each property
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

$testCandle = new PriceCandle(100, 110, 90, 105);
echo "Open: " . $testCandle->getOpen() . "\n";
echo "High: " . $testCandle->getHigh() . "\n";
echo "Low: " . $testCandle->getLow() . "\n";
echo "Close: " . $testCandle->getClose() . "\n";
?>