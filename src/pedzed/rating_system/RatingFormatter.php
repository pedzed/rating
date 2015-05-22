<?php

namespace pedzed\rating_system {
    
    class RatingFormatter {
        
        /**
         * @var string
         */
        protected $_filledIcon;
        
        /**
         * @var string
         */
        protected $_halfFilledIcon;
        
        /**
         * @var string
         */
        protected $_emptyFilledIcon;
        
        /**
         * @var float
         */
        protected $_rating;
        
        /**
         * @var int
         */
        protected $_maxRating = 5;
        
        /**
         * @return string
         */
        public function __toString() {
            return $this->getFormattedRating();
        }
        
        public function getFormattedRating() {
            $formattedRating = '';
            
            for($ratingIcon = 1; $ratingIcon <= $this->_maxRating; $ratingIcon++) {
                if($this->_isFilledIcon($ratingIcon)) {
                    $formattedRating .= $this->_filledIcon;
                } else if($this->_isEmptyFilledIcon($ratingIcon)) {
                    $formattedRating .= $this->_emptyFilledIcon;
                } else {
                    $formattedRating .= $this->_halfFilledIcon;
                }
            }
            
            return $formattedRating;
        }
        
        /**
         * @return bool
         */
        private function _isFilledIcon($iconIndex) {
            return $iconIndex <= ($this->_rating + 0.25);
        }
        
        /**
         * @return bool
         */
        private function _isEmptyFilledIcon($iconIndex) {
            return $iconIndex > ($this->_rating + 0.75);
        }
        
        public function setRating($rating) {
            $this->_rating = $rating;
        }
        
        /**
         * @return float
         */
        public function getRating() {
            return $this->_rating;
        }
        
        public function setMaximumRating($maxRating) {
            $this->_maxRating = $maxRating;
        }
        
        /**
         * @return int
         */
        public function getMaximumRating() {
            return $this->_maxRating;
        }
        
        public function setFilledIcon($filledIcon) {
            $this->_filledIcon = $filledIcon;
        }
        
        /**
         * @return string
         */
        public function getFilledIcon() {
            return $this->_filledIcon;
        }
        
        public function setHalfFilledIcon($halfFilledIcon) {
            $this->_halfFilledIcon = $halfFilledIcon;
        }
        
        /**
         * @return string
         */
        public function getHalfFilledIcon() {
            return $this->_halfFilledIcon;
        }
        
        public function setEmptyFilledIcon($emptyFilledIcon) {
            $this->_emptyFilledIcon = $emptyFilledIcon;
        }
        
        /**
         * @return string
         */
        public function getEmptyFilledIcon() {
            return $this->_emptyFilledIcon;
        }
        
    }
    
}
