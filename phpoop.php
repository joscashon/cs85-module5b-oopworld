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

    // Method to initialize the candle with semi-random values based on another candle (Written by claude sonnet 4)
    public function initFromCandle($baseCandle, $volatility = 0.05) {
        // Get the close price of the base candle as our starting point
        $basePrice = $baseCandle->getClose();
        $baseVolume = $baseCandle->getVolume();
        
        // Generate semi-random variation (±volatility%)
        $priceVariation = $basePrice * $volatility * (mt_rand(-100, 100) / 100);
        $volumeVariation = $baseVolume * 0.3 * (mt_rand(-100, 100) / 100); // 30% volume variation
        
        // Calculate new open price based on base candle's close with variation
        $this->open = $basePrice + $priceVariation;
        
        // Generate high and low within reasonable bounds
        $maxChange = $this->open * $volatility;
        $this->high = $this->open + mt_rand(0, $maxChange * 100) / 100;
        $this->low = $this->open - mt_rand(0, $maxChange * 100) / 100;
        
        // Generate close price between low and high
        $this->close = mt_rand($this->low * 100, $this->high * 100) / 100;
        
        // Ensure high is actually the highest and low is the lowest
        $allPrices = [$this->open, $this->high, $this->low, $this->close];
        $this->high = max($allPrices);
        $this->low = min($allPrices);
        
        // Set volume with variation
        $this->volume = max(1, $baseVolume + $volumeVariation);
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

// Test the new initFromCandle method (Written by claude sonnet 4)
echo "\n\n--- Testing initFromCandle method ---\n";
$newCandle = new PriceCandle(0, 0, 0, 0, 0); // Initialize with dummy values
$newCandle->initFromCandle($testCandle, 0.1); // 10% volatility
echo "\nNew candle based on test candle: " . $newCandle->displaySummary();
echo "\nNew candle price change: " . $newCandle->calcPriceChange();
echo "\nNew candle is bullish: " . ($newCandle->isBullish() ? 'Yes' : 'No');

// Create another candle to show variation (Written by claude sonnet 4)
$anotherCandle = new PriceCandle(0, 0, 0, 0, 0);
$anotherCandle->initFromCandle($testCandle, 0.05); // 5% volatility
echo "\nAnother candle with lower volatility: " . $anotherCandle->displaySummary();
?>