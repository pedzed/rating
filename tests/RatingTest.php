<?php

use pedzed\formatting\rating\RatingFormatter;

class RatingTest extends PHPUnit_Framework_TestCase {
    
    protected $_filledIcon = '[filled]';
    protected $_halfFilledIcon = '[half]';
    protected $_emptyFilledIcon = '[empty]';
    
    public function testRating() {
        $rating = 3;
        
        $ratingFormatter = new RatingFormatter();
        $ratingFormatter->setRating($rating);
        
        $this->assertEquals($rating, $ratingFormatter->getRating());
    }
    
    public function testMaximumRating() {
        $maximumRating = 10;
        
        $ratingFormatter = new RatingFormatter();
        $ratingFormatter->setMaximumRating($maximumRating);
        
        $this->assertEquals($maximumRating, $ratingFormatter->getMaximumRating());
    }
    
    public function testFilledIcon() {
        $ratingFormatter = new RatingFormatter();
        $ratingFormatter->setFilledIcon($this->_filledIcon);
        
        $this->assertEquals($this->_filledIcon, $ratingFormatter->getFilledIcon());
    }
    
    public function testHalfFilledIcon() {
        $ratingFormatter = new RatingFormatter();
        $ratingFormatter->setHalfFilledIcon($this->_halfFilledIcon);
        
        $this->assertEquals($this->_halfFilledIcon, $ratingFormatter->getHalfFilledIcon());
    }
    
    public function testEmptyFilledIcon() {
        $ratingFormatter = new RatingFormatter();
        $ratingFormatter->setEmptyFilledIcon($this->_emptyFilledIcon);
        
        $this->assertEquals($this->_emptyFilledIcon, $ratingFormatter->getEmptyFilledIcon());
    }
    
    public function testFormats() {
        $ratingFormatter = new RatingFormatter();
        $ratingFormatter->setFilledIcon($this->_filledIcon);
        $ratingFormatter->setHalfFilledIcon($this->_halfFilledIcon);
        $ratingFormatter->setEmptyFilledIcon($this->_emptyFilledIcon);
        
        $maximumRating = 3;
        $expectedFormats = [
            '1'     => $this->_filledIcon.$this->_emptyFilledIcon.$this->_emptyFilledIcon,
            '1.1'   => $this->_filledIcon.$this->_emptyFilledIcon.$this->_emptyFilledIcon,
            '1.24'  => $this->_filledIcon.$this->_emptyFilledIcon.$this->_emptyFilledIcon,
            '1.25'  => $this->_filledIcon.$this->_halfFilledIcon.$this->_emptyFilledIcon,
            '1.4'   => $this->_filledIcon.$this->_halfFilledIcon.$this->_emptyFilledIcon,
            '1.49'  => $this->_filledIcon.$this->_halfFilledIcon.$this->_emptyFilledIcon,
            '1.5'   => $this->_filledIcon.$this->_halfFilledIcon.$this->_emptyFilledIcon,
            '1.75'  => $this->_filledIcon.$this->_filledIcon.$this->_emptyFilledIcon,
            '1.9'   => $this->_filledIcon.$this->_filledIcon.$this->_emptyFilledIcon,
            '2'     => $this->_filledIcon.$this->_filledIcon.$this->_emptyFilledIcon,
            '3'     => $this->_filledIcon.$this->_filledIcon.$this->_filledIcon,
        ];
        
        $ratingFormatter->setMaximumRating($maximumRating);
        
        foreach($expectedFormats as $rating => $expectedFormat) {
            $ratingFormatter->setRating($rating);
            $actualFormat = $ratingFormatter->getFormattedRating();
            $this->assertEquals($expectedFormat, $actualFormat);
        }
    }
    
}
