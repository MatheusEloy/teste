<?php

/**
 * Class to make Object and build the JSON
 */
class Tweets{

    public $followers;
    public $screen_name;
    public $profile_link;
    public $created_at;
    public $link;
    public $retweet_count;
    public $text;
    public $favorite_count;

    /**
     * @param $var
     */
    public function setFollowers($var) {
        $this->followers = $var;
    }

    /**
     * @return $var
     */
    public function getFollowers() {
        return $this->followers;
    }

    /**
     * @param $var
     */
    public function setScreen_name($var) {
        $this->screen_name = $var;
    }

    /**
     * @return $var
     */
    public function getScreen_name() {
        return $this->screen_name;
    }

    /**
     * @param $var
     */
    public function setProfile_link($var) {
        $this->profile_link = $var;
    }

    /**
     * @return $var
     */
    public function getProfile_link() {
        return $this->profile_link;
    }

    /**
     * @param $var
     */
    public function setCreated_at($var) {
        $this->created_at = $var;
    }

    /**
     * @return $var
     */
    public function getCreated_at() {
        return $this->created_at;
    }

    /**
     * @param $var
     */
    public function setLink($var) {
        $this->link = $var;
    }

    /**
     * @return $var
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * @param $var
     */
    public function setRetweet_count($var) {
        $this->retweet_count = $var;
    }

    /**
     * @return $var
     */
    public function getRetweet_count() {
        return $this->retweet_count;
    }

    /**
     * @param $var
     */
    public function setText($var) {
        $this->text = $var;
    }

    /**
     * @return $var
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param $var
     */
    public function setFavorite_count($var) {
        $this->favorite_count = $var;
    }

    /**
     * @return $var
     */
    public function getFavorite_count() {
        return $this->favorite_count;
    }
}

?>