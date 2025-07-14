<?php
class PriceCandle {
    private $open; // Opening price of the candle
    private $high; // Highest price of the candle
    private $low;  // Lowest price of the candle
    private $close; // Closing price of the candle
    private $volume; // Volume of trades during the candle period

    // Constructor to initialize the candle with open, high, low, and close prices as well as trade volume
    public function __construct($open, $high, $low, $close, $volume) {
        $this->open = $open;
        $this->high = $high;
        $this->low = $low;
        $this->close = $close;
        $this->volume = $volume;
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

    public function getVolume() {
        return $this->volume;
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

    public function setVolume($volume) {
        $this->volume = $volume;
    }

    // Method to display a summary of the candle
    public function displaySummary() {
        return "Candle Summary: Open: {$this->open}, High: {$this->high}, Low: {$this->low}, Close: {$this->close}, Volume: {$this->volume}";
    }

    // Method to calculate the price change from open to close
    public function calcPriceChange() {
        return $this->close - $this->open;
    }

    // Method to determine if the candle is bullish
    public function isBullish() {
        return $this->close > $this->open;
    }

    // Method to determine if the candle is bearish
    public function isBearish() {
        return $this->close < $this->open;
    }
}

$testCandle = new PriceCandle(100, 110, 90, 105, 1000);
echo $testCandle->displaySummary(); // Should return "Candle Summary: Open: 100, High: 110, Low: 90, Close: 105, Volume: 1000"
echo "\nPrice Change: " . $testCandle->calcPriceChange(); // Should return 5
echo "\nIs Bullish: " . ($testCandle->isBullish() ? 'Yes' : 'No'); // Should return true
echo "\nIs Bearish: " . ($testCandle->isBearish() ? 'Yes' : 'No'); // Should return false
?>